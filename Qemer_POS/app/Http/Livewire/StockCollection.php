<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\User;
use App\Models\Stock as Stocks;
use App\Models\Category as categories;

class StockCollection extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $category_name;

    public function updatedSearch()
    {
        $this->page = 1;
    }

    public function render()
    {
        $search = '%'.$this->search.'%';

        $stockCollection = Stocks::where('stocks.name','like', $search)
                                ->join('categories', 'stocks.category_id', '=', 'categories.id')
                                ->orWhere('categories.category_name', 'like', $search)           
                                ->paginate(8);

        if ($stockCollection !== null) return view('livewire.stock-collection',['stockCollection' => $stockCollection] );
        else return redirect()->back()->with('error', 'no search result');
    }
}
