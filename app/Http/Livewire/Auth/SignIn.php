<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class SignIn extends Component
{

    public $email = '';
    public $password = '';
    public $failed = false;
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];
    public function mount()
    {
        if (auth()->user()) {
            return redirect()->intended('/dashboard');
        }
        $this->fill([
            'email' => 'admin@volt.com',
            'password' => 'secret',
        ]);
    }

    public function updatedPassword()
    {
        $this->validate(['password' => 'min:6',]);
    }

    public function login()
    {
        $credentials = $this->validate();
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(['email' => $this->email])->first();
            auth()->login($user, $this->remember_me);
            return redirect()->intended('/dashboard');
        } else {
            $this->failed = 'true';
            return $this->addError('email', trans('auth.failed'));
        }
    }

    public function render()
    {
        return view('livewire.auth.sign-in');
    }
}
