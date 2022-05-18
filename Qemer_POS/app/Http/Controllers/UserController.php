<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stock;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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

            return view('users', [
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
            'name' =>['required', 'string', 'max:255'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number'=>['required', 'max:14'],
            'avatar'=>'required|mimes:jpg,png,jpeg,svg,gif',
            'role'=>'required'
             
        ]);
        
        //image storing logic
        $avatar = $request->file('avatar');
        $avatarName= $avatar->getClientOriginalName();
        $avatar->storeAs('public\userImages',time().$avatarName);
        
        //creating a new user
        $newUser= new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->phone_number = $request->phone_number;
        $newUser->role = $request->role;
        $newUser->avatar = time().$avatarName;
        $newUser->save();
        return redirect()->back()->with('success','User added successfully');

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

    public function updatePassword(Request $request)
    {
        if (!(Hash::check($request->old_password, auth()->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","The old password you provided is incorrect");
        }

        if(strcmp($request->old_password, $request->password) == 0){
            // Current password and new password are the same
            return redirect()->back()->with("error","New Password cannot be the same as the old password.");
        }

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");    
        
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

            if($request->avatar==null){
                $users->avatar= $users->avatar;
            }else {
                $avatar = $request->file('avatar');
                $avatarName= $avatar->getClientOriginalName();
                $avatar->storeAs('public\userImages',time().$avatarName);

                $users->avatar= time().$avatarName;
            }
            if($request->role==null){
                $users->role= $users->role;
            }
            else{
                $users->role= $request->role;
            }
            $users->name= $request->name;
            $users->email= $request->email;
            $users->phone_number = $request->phone_number;
            $users->save();
            return redirect('/viewUsers')->with('message', 'users updated');
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

    public function hiddenRegisterUser()
    {
        return view('auth.register');
    }
}
