<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Livewire\Component;

class ForgotPassword extends Component
{
    use Notifiable;

    public $mailSentAlert = false;
    public $showDemoNotification = false;
    public $email='';
    public $rules=[
        'email' => 'required|email|exists:users'
    ];
    public function mount()
    {
        if (auth()->user()) {
            return redirect()->intended('/dashboard');
        }
    }
    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];
    public function updatedEmail()
    {
        $this->validate(['email'=>'required|email|exists:users']);
    }
    public function routeNotificationForMail() {
        return $this->email;
    }
    public function recoverPassword() {
        if(env('IS_DEMO')) {
            $this->showDemoNotification = true;
        }
        else {
            $this->validate();
            $user=User::where('email', $this->email)->first();
            $this->notify(new ResetPassword($user->id));
            $this->mailSentAlert = true;
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
