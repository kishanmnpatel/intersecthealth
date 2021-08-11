<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $entries = 10;
    public $search = '';
    public $sortField = 'first_name';
    public $sortDirection = 'asc';
    public $paginationTheme = 'bootstrap';
    public $fields = ['first_name', 'role_id', 'created_at', 'status'];
    public $showSuccessNotification = false;

    protected $queryString = ['sortField', 'sortDirection'];

    public function sortBy($field)
    {
        if($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else{
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
        $this->showSuccessNotification = false;
    }
    
    public function delete($id)
    {   
        User::find($id)->delete();
        $this->showSuccessNotification = true;
    }


    public function render()
    {
        return view('livewire.user-management', [
            'users' => User::searchMultipleUsers($this->fields, $this->search)->orderBy($this->sortField, $this->sortDirection)->paginate($this->entries),
        ]);
    }
}
