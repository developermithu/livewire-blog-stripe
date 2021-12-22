<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Social extends Component
{

    public $user;
    public $profile = [];

    public function mount()
    {
        $this->user = Auth::user();
        $this->profile = Auth::user()->profile->toArray();
    }

    public function updateProfileSocialLinks()
    {
        $this->user->profile()->update([
            'facebook' => $this->profile['facebook'],
            'instagram' => $this->profile['instagram'],
            'twitter' => $this->profile['twitter'],
            'linkedin' => $this->profile['linkedin'],
        ]);

        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.profile.social');
    }
}
