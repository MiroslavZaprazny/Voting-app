<?php

namespace App\Http\Livewire\Traits;

trait WithAuthRedirects
{
    /**
     * Redirects to login page, 
     * when user signs in it returns him back to previous location
     */
    public function redirectToLogin()
    {
        redirect()->setIntendedUrl(url()->previous());
        return redirect()->route('login');
    }
}
