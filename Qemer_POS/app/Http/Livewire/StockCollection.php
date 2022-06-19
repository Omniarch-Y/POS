<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\User;
use App\Models\Stock as Stocks;
use App\Models\Category as categories;
use App\Models\Branch;

class StockCollection extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $category_name;
  

    public function render()
    {
        $search = '%'.$this->search.'%';
        $stockCollection = Stocks::where('stocks.name','like', $search)->where('stocks.branch_id', auth()->user()->branch_id)
                                ->join('categories', 'stocks.category_id', '=', 'categories.c_id')
                                ->orWhere('categories.category_name', 'like', $search)->where('stocks.branch_id', auth()->user()->branch_id)       
                                ->paginate(5);

        if ($stockCollection !== null) return view('livewire.stock-collection',[
            'stockCollection' => $stockCollection
            ] );
        else return redirect()->back()->with('error', 'no search result');
    }
}
