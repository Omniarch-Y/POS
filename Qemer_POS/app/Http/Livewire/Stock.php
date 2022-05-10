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

    public $sortColumnName = 'asc';

    public $sortDirection = 'desc';

    public function updatedSearch()
    {
        $this->page = 1;
    }

    public function updatingSearchInput(): void

    {

        $this->gotoPage(1);

    }

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

        $searchTerm = '%'.$this->searchTerm.'%';
        
        $stocks = Stocks::where('stocks.name' ,'like' ,$searchTerm)
                                ->join('categories', 'stocks.category_id', '=', 'categories.c_id')
                                ->orWhere('categories.category_name', 'like', $searchTerm)
                                // ->orderBy($this->sortColumnName, $this->sortDirection)           
                                ->paginate(5);

        if ($stocks !== null) return view('livewire.stock',['stocks' => $stocks] );
        else return redirect()->back()->with('error', 'no search result');

    }

}