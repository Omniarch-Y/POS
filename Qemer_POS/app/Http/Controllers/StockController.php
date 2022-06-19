<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Category;
use App\Models\Cart;
use App\Models\User;
use App\Models\Branch;

class stockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {   
        $branches = Branch::all();
        $branch=Branch::where('id',auth()->user()->branch_id)->first();
        $categories = Category::all();
        $stocks = Stock::where('branch_id',auth()->user()->branch_id)->paginate(6);
        $myCart = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cartTotal = $myCart->count();
        $cartItems = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cash = Cart::where('status',0)->where('casher_id',auth()->user()->id)->sum('total_price');
        $vat = $cash*0.15;
        $vatIncluded = $vat+$cash;
        $value = number_format( $vatIncluded, 2, '.', '');
        //data to be displayed on the company chart.
        $users = User::all()->where('branch_id',auth()->user()->branch_id)->count();
        
        if (auth()->user()->role == 'casher'){

            return view('home', [
                'branches' => $branches,
                'stocks' => $stocks,
                'informations'=>$cartItems,
                'totalItemPrice' => $value,
                'cartTotal'=>$cartTotal,
                'branch'=>$branch,
            ]);
        }
        else{
            return view('viewCollection', [
                'branches' => $branches,
                'categories' => $categories,
                'informations' => $cartItems,
                'totalItemPrice' => $value,
                'users' => $users,
                'stocks' => $stocks->count(),
                'branch'=>$branch,
            ]);
        }
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
            'category'=>'required',
            'branch'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg,svg,gif',
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
            $newItem->branch_id= $request->branch;
            $newItem->category_id= $request->category;
            $newItem->branch_id= auth()->user()->branch_id;
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
        $currentCategory = Category::all()->where('c_id', $stock->category_id);

        $categories = Category::all();

        return view('Templates.editStock',compact('stock','categories','currentCategory'));
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
        

        if($request->category_id == null){
            $stocks->category_id = $stocks->category_id;
        }else{
            $stocks->category_id = $request->category_id;
        }

        if($request->image==null){
            $stocks->image = $stocks->image;
        }else{
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public\itemImages',time().$imageName);
            $stocks->image = time().$imageName;
        }
            $stocks->name= $request->name;
            $stocks->total_amount= $request->total_amount;
            $stocks->price= $request->price;
            $stocks->save();

        return redirect('/collection')->with('success','Item updated successfully');
  
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

        return redirect()->back()->with('success','Item deleted successfully');
    }

    public function sortItems($id){
        $existingItems = Category::find($id);
        $branches = Branch::all();
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
                'branches' =>$branches,
                'stocks'=>$sortedItem,
                'categories' => $sortedItem,
                'informations'=>$cartItems,
                'totalItemPrice' => $value,
                 'cartTotal'=>$cartTotal
            ]);
        }
        return redirect()->back()->with('error', "Sorry there aren't any items added to this category yet");
    }

    public function display(){
            $branches = Branch::all();
            $branch=Branch::where('id',auth()->user()->branch_id)->first();
            $stocks = Stock::inRandomOrder()->paginate(6);
            $category = Category::inRandomOrder()->paginate(5);
            $myCart = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
            $cartTotal=$myCart->count();
            $cartItems = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
            $cash= Cart::where('status',0)->where('casher_id',auth()->user()->id)->sum('total_price');
            $vat=$cash*0.15;
            $vatIncluded=$vat+$cash;
            $value= number_format( $vatIncluded, 2, '.', '');
            $users = User::all()->where('branch_id',auth()->user()->branch_id)->count();
        
            return view('viewCollection', [
                'stocks' => $stocks,
                'categories' => $category,
                'informations'=>$cartItems,
                'totalItemPrice' => $value,
                'cartTotal'=>$cartTotal,
                'branches' => $branches,
                'users' => $users,
                'stocks' => $stocks->count(),
                'branch'=>$branch,
         ]);
    }

    public function editView()
    {
        $categories = Category::inRandomOrder()->paginate(5);

        return view('Templates.editStock',['categories' => $categories]);    
    }
}
