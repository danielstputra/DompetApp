<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;

    public $users;
    public $messages = '';
    public $sender;
    public $message;
    public $file;
    public $not_seen;

    public function render()
    {
        return view('admin.messages.livewire.show', [
            'users' => $this->users,
            'messages' => $this->messages,
            'sender' => $this->sender
        ]);
    }

    public function mount() {
        if (auth()->user()->user_level == 'member') {
            $this->messages = \App\Models\Message::where('user_id', auth()->user_id())
                                                    ->orWhere('receiver', auth()->user_id())
                                                    ->orderBy('message_id', 'DESC')
                                                    ->get();
        } else {
            $this->messages = \App\Models\Message::where('user_id', $this->sender->user_id)
                                                    ->orWhere('receiver', $this->sender->user_id)
                                                    ->orderBy('message_id', 'DESC')
                                                    ->get();
        }
        $not_seen = \App\Models\Message::where('user_id', $this->sender->user_id)->where('receiver', auth()->user_id());
        $not_seen->update(['is_seen' => true]);
    }
}
