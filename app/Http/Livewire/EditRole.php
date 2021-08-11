<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditRole extends Component
{
    public Role $role;
    public $urlId = '';
    public $showDemoNotification = false;

    protected function rules()
    {
        return [
            'role.name' => ['max:10', 'required', Rule::unique('roles', 'name')->ignore($this->role)],
            'role.description' => 'max:500',
        ];
    }

    public function updated()
    {
        $this->validate([
            'role.name' => ['max:10', 'required', Rule::unique('roles', 'name')->ignore($this->role)],
            'role.name' => 'max:15',
        ]);
    }

    public function mount($id)
    {
        $existingRole = Role::find($id);
        $this->role = $existingRole;
        $this->urlId = intval($existingRole->id);
    }

    public function edit()
    {

        $this->validate();
        $existingRole = Role::where('id', $this->role->id)->first();
        if ($existingRole && $existingRole->id == $this->urlId) {
            $this->role->update();

            session()->flash('success', 'Role edited successfully.');
            return redirect(route('role-management'));
        }
    }

    public function render()
    {
        return view('livewire.edit-role');
    }
}
