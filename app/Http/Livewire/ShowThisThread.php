<?php

namespace App\Http\Livewire;

use App\Models\Thread;
use Livewire\Component;

class ShowThisThread extends Component
{
    public Thread $thread;
    public $body = '';

    public function postReply(){
        $this->validate([
            'body' => 'required'
        ]);

        auth()->user()->replies()->create([
            'thread_id' => $this->thread->id,
            'body' => $this->body
        ]);

        $this->body = '';
    }

    public function render()
    {

        return view('livewire.show-this-thread',[
            'replies' => $this->thread
                ->replies()
                ->whereNull('reply_id')
                ->with('user', 'replies.user', 'replies.replies')
                ->get()
        ])->layout('layouts.app');
    }
}
