<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Category;
use App\Models\Cart;

class stockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $stocks = Stock::inRandomOrder()->paginate(6);
        $category = Category::inRandomOrder()->paginate(5);
        $myCart = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cartTotal=$myCart->count();
        $cartItems = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cash= Cart::where('status',0)->where('casher_id',auth()->user()->id)->sum('total_price');
        $vat=$cash*0.15;
        $vatIncluded=$vat+$cash;
        $value= number_format( $vatIncluded, 2, '.', '');
       
        // $cashOut=$cash->sum();

        return view('home', [
            'stocks' => $stocks,
            'categories' => $category,
            'informations'=>$cartItems,
            'totalItemPrice' => $value,
            'cartTotal'=>$cartTotal,
        ]);
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'total_amount'=>'required',
            'price'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg,svg,gif',
            'role'=>'required',
             
        ]);

        //image storing logic
        $image = $request->file('image');
        $imageName= $image->getClientOriginalName();
        $image->storeAs('public\itemImages',time().$imageName);
        
        //checking if the item already exists in the stock 
        $itemExists= Stock::where('name',$request->name)->where('category_id',$request->category)->first();
        if($itemExists){
           $newAmount= $itemExists->total_amount + $request->total_amount;
           Stock::where('name',$request->name)->where('category_id',$request->category)->update(['total_amount' => $newAmount]);
           return redirect()->back()->with('success','Item amount updated successfully');
        }
        else{
               //creating a new item
        $newItem= new Stock();
        $newItem->name= $request->name;
        $newItem->total_amount= $request->total_amount;
        $newItem->price= $request->price;
        $newItem->image= time().$imageName;
        $newItem->category_id= $request->category;
        $newItem->save();
        return redirect()->back()->with('success','Item added successfully');

        }
     

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);
        $categories = Category::inRandomOrder()->paginate(5);
        return view('Templates.editStock',compact('stock','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stocks = Stock::find($id);
        $stocks->category_id = $request->input('category_id');
        $input = $request->all();
        $stocks->update($input);
        return redirect('/collection')->with('message', 'stock updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $stocks = Stock::find($id);
        $stocks->delete();
        return redirect('/collection')->with('message','stock deleted');
    }

    public function sortItems($id){
        $existingItems = Category::find($id);
        $sortedItem= Stock::where('category_id',$existingItems->id)->paginate(5);
        $cartItems = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cash= Cart::where('status',0)->where('casher_id',auth()->user()->id)->sum('total_price');
        $vat=$cash*0.15;
        $vatIncluded=$vat+$cash;
        $value= number_format( $vatIncluded, 2, '.', '');
        $myCart = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cartTotal=$myCart->count();
        
        if($sortedItem->count()>0){
            return view('home',[
                'stocks'=>$sortedItem,
                'categories' => $sortedItem,
                'informations'=>$cartItems,
                'totalItemPrice' => $value,
                 'cartTotal'=>$cartTotal
            ]);
    }
    
        return redirect()->back()->with('error', 'Sorry there is no product added to this category yet');
}
    public function display(){
            $stocks = Stock::inRandomOrder()->paginate(6);
            $category = Category::inRandomOrder()->paginate(5);
            $myCart = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
            $cartTotal=$myCart->count();
            $cartItems = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
            $cash= Cart::where('status',0)->where('casher_id',auth()->user()->id)->sum('total_price');
            $vat=$cash*0.15;
            $vatIncluded=$vat+$cash;
            $value= number_format( $vatIncluded, 2, '.', '');
        
            // $cashOut=$cash->sum();

            return view('viewCollection', [
                'stocks' => $stocks,
                'categories' => $category,
                'informations'=>$cartItems,
                'totalItemPrice' => $value,
                'cartTotal'=>$cartTotal,
            ]);
    }

    public function editView()
    {
        $categories = Category::inRandomOrder()->paginate(5);
        return view('Templates.editStock',['categories' => $categories]);
        
    }

}
