<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\User;
use App\Models\Stock as Stocks;
use App\Models\Category as categories;

class Stock extends Component

{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm = '';
    public $category_name;

    public function updatedSearch()
    {
        $this->page = 1;
    }

    // public function updatingSearchInput()

    // {

    //     $this->gotoPage(1);

    // }

    // public function updatingSearchInput(): void
    // {
    //     $this->gotoPage(1);
    // }
    
    public function render()

    {

        $searchTerm = '%'.$this->searchTerm.'%';
<<<<<<< HEAD
        
        $stocks = Stocks::where('stocks.name', $searchTerm)
                                ->join('categories', 'stocks.category_id', '=', 'categories.id')
=======

        $stocks = Stocks::where('stocks.name','like', $searchTerm)
                                ->join('categories', 'stocks.category_id', '=', 'categories.c_id')
>>>>>>> 931d22f4f5e51ce9bba558e5370cdeaf6adce848
                                ->orWhere('categories.category_name', 'like', $searchTerm)           
                                ->paginate(8);
                                

<<<<<<< HEAD
        if ($stocks !== null)
         return view('livewire.stock',[
            'stocks' => $stocks,
            
            ] );
        else return redirect()->back()->with('error', 'no search result'); 
=======
        if ($stocks !== null) return view('livewire.stock',['stocks' => $stocks] );
        else return redirect()->back()->with('error', 'no search result');

        // $searchTerm = '%'.$this->searchTerm.'%';

        // $stockCollection = Stocks::where('stocks.name','like', $search)
        //                         ->join('categories', 'stocks.category_id', '=', 'categories.c_id')
        //                         ->orWhere('categories.category_name', 'like', $search)           
        //                         ->paginate(8);

        // if ($stockCollection !== null) return view('livewire.stockCollection',['stockCollection' => $stockCollection] );
        // else return redirect()->back()->with('error', 'no search result');
>>>>>>> 931d22f4f5e51ce9bba558e5370cdeaf6adce848

    }

}