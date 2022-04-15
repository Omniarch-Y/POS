<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Receipt;
use App\Models\Stock;
use DateTime;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cartItems = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cash= Cart::where('status',0)->where('casher_id',auth()->user()->id)->sum('total_price');
        $value= number_format($cash);
        $vat=$cash*0.15;
        $vatIncluded=$vat+$cash;
        $rno=random_int(0,9999999999);
        $tno=$request->Tin_number;
        //validation for payment goes here
       
            // $cashOut=$cash->sum();
    
            return view('Templates.printForm', [
                'informations'=>$cartItems,
                'totalItemPrice' => $value,
                'total'=> $vatIncluded,
                'vat'=>$vat,
                'Rno'=>$rno,
                'tin_number'=>$tno
                
            
            ]);
    }

    public function anyReport(Request $request){

          
        
        $cartItems = Cart::where('status',1)->where('created_at',$request->date)->with('item')->orderBy('created_at','DESC')->paginate(5);
        $myCart = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cartTotal=$myCart->count();
        if($cartItems->count()>0){
            $cash= Cart::where('status',1)->where('created_at',$request->date)->sum('total_price');
            $value= number_format($cash);
            $Total= number_format($cash);
              return view('dailyReport',[
                'informations'=>$cartItems,
                'cash' => $Total,
                'cartTotal'=>$cartTotal,
                'totalItemPrice' => $value,
            ]);
        }  
        return redirect()->back()->with('error','No item has been purchased in this date ');    
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
           'amount'=>'required',
        ]);

        $newItem = new Cart();
        $newItem->amount = $request->amount;
        $newItem->total_price = $request->price * $request->amount;
        $newItem->stock_id = $request->stock_id;
        $newItem->casher_id = auth()->user()->id;
        $newItem->save();

        return redirect()->back()->with('success','Cart added successfully');

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
        //
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
        //
    }
    public function changeStatus(Request $request)
    {
        $generateFS=new Receipt();
        $existingTin= Receipt::where('tin_number',$request->tin_number)->first();
        if($existingTin){
            $generateFS->receipt_number=$request->FS;
            $generateFS->tin_number=null;
            $generateFS->save();

        }
        else{
             $generateFS->receipt_number=$request->FS;
             $generateFS->tin_number=$request->tin_number;
             $generateFS->save();
        }
       
        $query1=Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->update(['rno' => $request->FS]);
        $query1=Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->update(['tno' => $request->tin_number]);
        $query2=Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->update(['status' => '1']);
  
        

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function listReport(){

        $cartItems = Cart::where('status',1)->with('item')->orderBy('created_at','DESC')->paginate(5);
        $cash= Cart::where('status',1)->where('created_at',now()->format('Y-m-d'))->sum('total_price');
        $myCart = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cartTotal=$myCart->count();
        $value= number_format($cash);
        
        $Total= number_format($cash);       
            return view('dailyReport',[
                 
                'informations'=>$cartItems,
                'cash' => $Total,
                'cartTotal'=>$cartTotal,
              'totalItemPrice' => $value,
                 
                
            ]);
    
}
}
