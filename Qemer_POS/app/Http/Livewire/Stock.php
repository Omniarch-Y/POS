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

  
    
    public function render()

    {

        $searchTerm = '%'.$this->searchTerm.'%';
        
        $stocks = Stocks::where('stocks.name' ,'like' ,$searchTerm)
                                ->join('categories', 'stocks.category_id', '=', 'categories.id')
                                ->orWhere('categories.category_name', 'like', $searchTerm)           
                                ->paginate(8);

        if ($stocks !== null) return view('livewire.stock',['stocks' => $stocks] );
        else return redirect()->back()->with('error', 'no search result');

    }

}