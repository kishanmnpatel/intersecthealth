<?php

namespace App\Http\Livewire\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SignUp extends Component
{

    public Role $role;
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';
    public $first_name = '';
    public $last_name = '';
    public $roles;
    public $role_id = '';

    public function mount()
    {
        $this->roles = Role::take(3)->get();
        if (auth()->user()) {
            return redirect()->intended('/dashboard');
        }
    }

    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required|same:passwordConfirmation|min:6',
            'first_name' => 'required|max:15',
            'last_name' => 'required|max:15',
            'role_id' => ['required', Rule::in(collect(DB::table('roles')->pluck('id')))]
        ];
    }

    protected $messages = [
        'role_id.required' => 'The role is not valid',
    ];

    public function updated()
    {
        $this->validate([
            'email' => 'email|unique:users',
            'password' => 'min:6|same:passwordConfirmation',
            'first_name' => 'max:15',
            'last_name' => 'max:15',
        ]);
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
            'status' => 'Active',
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'role_id' => $this->role_id
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}
