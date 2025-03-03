<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
//    #[Layout('components.layouts.app')]
    public $username='';
    public $email='';
    public $password='';

    public function resetForm()
    {
        $this->username='';
        $this->email='';
        $this->password='';
    }
    public function register()
    {
        $this->validate([
            'username'=>'required|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
        ]);

        $user = new User();
        $user->username=$this->username;
        $user->email=$this->email;
        $user->password=Hash::make($this->password);
        $user->save();

        return redirect()->route('login');
    }
    public function render()
    {
        $this->resetForm();
        return view('livewire.register')->layout('components.layouts.login');
    }
}
