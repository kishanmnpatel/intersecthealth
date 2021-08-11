<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class NewRole extends Component
{
    public $name = '';
    public $description = '';
    public $showDemoNotification = false;

    public $rules = [
        'name' => 'max:10|required|unique:roles',
        'description' => 'max:100'
    ];

    public function updated()
    {
        $this->validate([
            'name' => 'max:10|required|unique:roles',
            'description' => 'max:500',
        ]);
    }

    public function add()
    {

        $this->validate();

        $role = Role::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Role created successfully.');
        return redirect(route('role-management'));

    }


    public function render()
    {
        return view('livewire.new-role');
    }
}
