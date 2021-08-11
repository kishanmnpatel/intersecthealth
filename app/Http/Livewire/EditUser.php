<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;

    public User $user;
    public $urlId = '';
    public $upload;
    public $password = '';
    public $passwordConfirmation = '';
    public $roles;
    public $showDemoNotification = false;

    protected function rules()
    {

        return [
            'user.email' => ['email', 'required', Rule::unique('users', 'email')->ignore($this->user)],
            'user.first_name' => 'max:15',
            'user.last_name' => 'max:20',
            'user.phone' => '',
            'user.status' => ['required', Rule::in(['Active', 'Pending', 'Suspended'])],
            'user.role_id' => ['required', Rule::in(collect(DB::table('roles')->pluck('id')))],
            'password' => 'min:6|same:passwordConfirmation',
            'upload' => 'nullable|image|max:2000'
        ];
    }

    protected $messages = [
        'user.role_id.required' => 'The role is not valid',
    ];

    public function updated()
    {
        $this->validate([
            'user.first_name' => 'max:15',
            'user.last_name' => 'max:20',
            'user.email' => ['email', 'required', Rule::unique('users', 'email')->ignore($this->user)],
            'user.phone' => '',
            'password' => 'min:6|same:passwordConfirmation',
            'upload' => 'nullable|image|max:2000'
        ]);
    }

    public function mount($id)
    {
        $existingUser = User::find($id);
        $this->user = $existingUser;
        $this->urlId = intval($existingUser->id);
        $this->roles = Role::all();
    }


    public function edit()
    {

        $this->validate();
        $existingUser = User::where('id', $this->user->id)->first();
        if ($existingUser && $existingUser->id == $this->urlId) {

            $existingUser->update([
                'password' => Hash::make($this->password),
            ]);

            $this->user->update();

            $this->upload && $this->user->update([
                'avatar' => $this->upload->store('/', 'avatars'),
            ]);

            session()->flash('success', 'User edited successfully.');
            return redirect(route('user-management'));
        }
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
