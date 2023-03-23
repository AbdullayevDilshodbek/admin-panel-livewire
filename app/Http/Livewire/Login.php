<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $form = [
        'username' => '',
        'password' => ''
    ];

    public function render()
    {
        return view('livewire.login');
    }

    public function mount()
    {
        $auth = Auth::user();
        if($auth?->id){
            return redirect('/users');
        }
    }

    public function login()
    {
        error_log('salom');
        auth()->attempt([
            'username' => $this->form['username'],
            'password' => $this->form['password']
        ]);
        return redirect('/users');
    }
}
