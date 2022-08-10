<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;
    public $remember;

    protected $rules = [
        'email' => 'required|max:50',
        'password' => 'required',
    ];

    public function render(): Factory|View|Application
    {
        return view('livewire.auth.login');
    }

    public function mount()
    {
        $this->fill(['email' => '', 'password' => '']);
    }

    /**
     * @throws ValidationException
     */
    public function store(): Redirector|Application|RedirectResponse
    {
        $this->validate([
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'min:8']
        ]);

        if (
            Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password], $this->remember) ||
            Auth::guard('admin')->attempt(['username' => $this->email, 'password' => $this->password], $this->remember)
        ) {

            session()->regenerate();
            return redirect()->route('dashboard');

        } else {
            if (!auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
                throw ValidationException::withMessages([
                    'email' => 'Your provided credentials could not be verified.'
                ]);
            }
            session()->regenerate();
            return redirect('/dashboard');
        }
    }
}
