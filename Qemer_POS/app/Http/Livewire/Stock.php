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

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $category_name;

    public $sortColumnName = 'asc';

    public $sortDirection = 'desc';

    public function sortBy($columnName){

        if($this->sortColumnName === $columnName){

            $this->sortDirection = $this->swapSortDirection();

        }else {
            $this->sortDirection = 'asc';
        }

          $this->sortColumnName = $columnName;
        }
    
        public function swapSortDirection(){
            return $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }
    
    public function render()

    {

        $search = '%'.$this->search.'%';
        
        $stocks = Stocks::where('stocks.name' ,'like' ,$search)
                                ->join('categories', 'stocks.category_id', '=', 'categories.c_id')
                                ->orWhere('categories.category_name', 'like', $search)
                                // ->orderBy($this->sortColumnName, $this->sortDirection)           
                                ->paginate(5);

        if ($stocks !== null) return view('livewire.stock',['stocks' => $stocks] );
        else return redirect()->back()->with('error', 'no search result');

    }

}