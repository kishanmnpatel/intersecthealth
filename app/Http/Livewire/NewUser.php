<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class NewUser extends Component
{
    use WithFileUploads;

    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $phone = '';
    public $status = '';
    public $upload;
    public $password = '';
    public $passwordConfirmation = '';
    public $roles;
    public $role_id = '';
    public $showDemoNotification = false;


    public function mount()
    {
        $this->roles = Role::all();
    }

    protected function rules()
    {
        return [
            'email' => 'email|required|unique:users',
            'first_name' => 'max:15',
            'last_name' => 'max:20',
            'phone' => '',
            'status' => ['required', Rule::in(['Active', 'Pending', 'Suspended'])],
            'role_id' => ['required', Rule::in(collect(DB::table('roles')->pluck('id')))],
            'password' => 'required|min:6|same:passwordConfirmation',
            'upload' => 'nullable|image|max:2000'
        ];
    }

    protected $messages = [
        'role_id.required' => 'The role is not valid',
    ];

    public function updated()
    {
        $this->validate([
            'first_name' => 'max:15',
            'last_name' => 'max:20',
            'email' => 'email|required|unique:users',
            'phone' => '',
            'password' => 'min:6|same:passwordConfirmation',
            'upload' => 'nullable|image|max:2000'
        ]);
    }

    public function add()
    {

        $this->validate();

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
            'role_id' => $this->role_id,
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
        ]);

        $this->upload && $user->update([
            'avatar' => $this->upload->store('/', 'avatars'),
        ]);

        session()->flash('success', 'User created successfully.');
        return redirect(route('user-management'));
    }


    public function render()
    {
        return view('livewire.new-user');
    }
}
