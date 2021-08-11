<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Roles extends Component
{

    use WithPagination;

    public $entries = 10;
    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $paginationTheme = 'bootstrap';
    public $fields = ['name', 'description', 'created_at'];

    public $showSuccessNotification = false;
    public $showFailNotification = false;

    protected $queryString = ['sortField', 'sortDirection'];

    public function sortBy($field)
    {
        if($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else{
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function checkIfUserHasRole($id) {
        $users = User::all();
        for($i=0; $i<count($users); $i++) {
            if($id === $users[$i]->role_id)
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        if($this->checkIfUserHasRole($id)) {
            $this->showFailNotification = true;
            $this->showSuccessNotification = false;
        }
        else {
            Role::find($id)->delete();
            $this->showSuccessNotification = true;
            $this->showFailNotification = false;
        }
    }

    public function render()
    {
        return view('livewire.role-management', [
            'roles' => Role::searchMultipleRoles($this->fields, $this->search)->orderBy($this->sortField, $this->sortDirection)->paginate($this->entries),
        ]);
    }
}
