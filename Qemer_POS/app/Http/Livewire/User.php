<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as Users;

class User extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $search = '%'.$this->search.'%';

        $users = Users::where('name','like', $search)
                                ->orWhere('email', 'like', $search)
                                ->orWhere('phone_number', 'like', $search)           
                                ->paginate(5);

        if ($users !== null) return view('livewire.user',['users' => $users,]);
        else return redirect()->back()->with('error', 'no search result');
    }

    public function updatingSearchInput()
    {
        $this->gotoPage(1);
    }
}
