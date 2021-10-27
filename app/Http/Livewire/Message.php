<?php

namespace App\Http\Livewire;

use \App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads; 

class Message extends Component
{
    use WithFileUploads;

    public $message = '';
    public $users;
    public $clicked_user;
    public $messages;
    public $file;
    public $admin;

    public function render()
    {
        return view('admin.messages.livewire.message', [
            'users' => $this->users,
            'admin' => $this->admin
        ]);
    }

    public function mount() {
        if (auth()->user()->user_level == 'member') {
            $this->messages = \App\Models\Message::where('user_id', auth()->user_id())
                                                    ->orWhere('receiver', auth()->user_id())
                                                    ->orderBy('message_id', 'DESC')
                                                    ->get();
        } else {
            $this->messages = \App\Models\Message::where('user_id', $this->clicked_user)
                                                    ->orWhere('receiver', $this->clicked_user)
                                                    ->orderBy('message_id', 'DESC')
                                                    ->get();
        }
        $this->admin = \App\Models\User::where('user_level', 'administrator')->first();
    }
}
