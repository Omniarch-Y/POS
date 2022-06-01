<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
         return $this->middleware('isAdmin');
     }
    public function index()
    {
        $cartItems = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cash= Cart::where('status',1)->where('created_at',now()->format('Y-m-d'))->sum('total_price');
        $myCart = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cartTotal=$myCart->count();
        $rno=Receipt::paginate(20);
        $value= number_format($cash);
        $Total= number_format($cash);

        /* For navbar */
        $cartCash= Cart::where('status',0)->where('casher_id',auth()->user()->id)->sum('total_price');
        $vat=$cartCash*0.15;
        $vatIncluded=$vat+$cartCash;
        $cartValue= number_format( $vatIncluded, 2, '.', '');
        /* End For navbar */
               
            return view('receiptList',[
                 
                'informations'=>$cartItems,
                'cash' => $Total,
                'cartTotal'=>$cartTotal,
                'totalItemPrice' => $cartValue,
                'receiptNo' => $rno
                
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cartItems = Cart::where('rno',$id)->with('item')->get();
        $cartDate=Cart::where('rno',$id)->limit(1)->first();
        $date=$cartDate->created_at;
        $cash= Cart::where('rno',$id)->sum('total_price');
        $value= number_format($cash);
        $vat=$cash*0.15;
        $vatIncluded=$vat+$cash;
        $rno=$id;
        //validation for payment goes here
    
            return view('Templates.receiptForm', [
                'informations'=>$cartItems,
                'totalItemPrice' => $value,
                'total'=> $vatIncluded,
                'vat'=>$vat,
                'Rno'=>$rno,
                'date'=>$date
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sortReceipt(Request $request)
    {     
        $cartItems = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cartItems = Cart::where('status',1)->where('created_at',$request->date)->with('item')->orderBy('created_at','DESC')->paginate(5);
        $myCart = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cartTotal=$myCart->count();

        /* For navbar */
        $cartCash= Cart::where('status',0)->where('casher_id',auth()->user()->id)->sum('total_price');
        $vat=$cartCash*0.15;
        $vatIncluded=$vat+$cartCash;
        $cartValue= number_format( $vatIncluded, 2, '.', '');
        /* End For navbar */

        if($cartItems->count()>0){
            $cash= Cart::where('status',1)->where('created_at',$request->date)->sum('total_price');
            $value= number_format($cash);
            $Total= number_format($cash);
            $rno=Receipt::where('created_at',$request->date)->orderBy('created_at','DESC')->paginate(20);
            if($rno){
            return view('receiptList',[
                'informations'=>$cartItems,
                'cash' => $Total,
                'cartTotal'=>$cartTotal,
                'totalItemPrice' => $cartValue,
                'receiptNo' => $rno
               ]);
            }
            return redirect()->back()->with('error','No item has been purchased in this date');  
        }  
        return redirect()->back()->with('error','No item has been purchased in this date');    
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
}
