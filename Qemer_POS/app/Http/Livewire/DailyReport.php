<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Branch;
use Livewire\WithPagination;

class DailyReport extends Component
{      
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $soldItems = Cart::where('status',1)->with('item')->orderBy('created_at','DESC')->paginate(5);
        $cartItems = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cash= Cart::where('status',1)->where('created_at',now()->format('Y-m-d'))->sum('total_price');
        $myCart = Cart::where('status',0)->where('casher_id',auth()->user()->id)->with('item')->get();
        $cartTotal=$myCart->count();
        $value= number_format($cash);
        $branch = Branch::all();
        
        $Total= number_format($cash);
        
        $cartCash= Cart::where('status',0)->where('casher_id',auth()->user()->id)->sum('total_price');
        $vat=$cartCash*0.15;
        $vatIncluded=$vat+$cartCash;
        $cartValue= number_format( $vatIncluded, 2, '.', '');

            return view('livewire.daily-report',[
                'branches' => $branch,
                'soldItems'=>$soldItems,
                'informations'=>$cartItems,
                'cash' => $Total,
                'cartTotal'=>$cartTotal,
                'totalItemPrice' => $cartValue,
         ]);         
        // return view('livewire.daily-report');
    }
}
