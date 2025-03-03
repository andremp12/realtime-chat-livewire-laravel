<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login(){
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email'=>$this->email,'password'=>$this->password])){
            return redirect()->route('dashboard');
        }

        $this->addError('email','Invalid Email or Password');
        $this->password = '';
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.login')->layout('components.layouts.login');
    }
}
