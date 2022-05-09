<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stock;
use App\Models\Category;
use App\Models\Cart;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

            return view('users', [
                'stocks' => $stocks,
                'categories' => $category,
                'informations'=>$cartItems,
                'totalItemPrice' => $value,
                'cartTotal'=>$cartTotal,
            ]);
    }

    public function viewPass(){

        return view('Templates.changePassword');
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
            'email'=>'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg,svg,gif',
             
        ]);

        //image storing logic
        $image = $request->file('image');
        $imageName= $image->getClientOriginalName();
        $image->storeAs('public\userImages',time().$imageName);
        
        //checking if the item already exists in the stock 
        // $userExists= User::where('name',$request->name)->where('category_id',$request->category)->first();
        // if($userExists){
        //    $newAmount= $itemExists->total_amount + $request->total_amount;
        //    Stock::where('name',$request->name)->where('category_id',$request->category)->update(['total_amount' => $newAmount]);
        //    return redirect()->back()->with('success','Item amount updated successfully');
        // }
        // else{
               //creating a new item
        $newItem= new User();
        $newItem->name = $request->name;
        $newItem->email = $request->email;
        $newItem->password = $request->password;
        $newItem->phone_number = $request->phone_number;
        $newItem->image = time().$imageName;
        $newItem->save();
        return redirect()->back()->with('success','User added successfully');

        // }
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
        $user = User::find($id);
        return view('Templates.editUser',compact('user'));
    }

    public function editPassword()
    {
        $users = User::find($auth()->user()->id);
        // $users->password = $request->input('password');
        $input = $request->password;
        $users->update($input);
        return redirect('/collection')->with('message', 'stock updated');
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
        $users = User::find($id);
        $input = $request->all();
        $users->update($input);
        return redirect('/viewUsers')->with('message', 'user updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $users = User::find($id);
        $users->delete();
        return redirect('/viewUsers')->with('message','user deleted');
    }
}
