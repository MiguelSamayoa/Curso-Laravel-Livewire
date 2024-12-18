<?php

namespace App\Http\Livewire;

use App\Models\Reply;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShowReply extends Component
{
    use AuthorizesRequests;
    public Reply $reply;
    public $body = '';
    public $is_creating = false;
    public $is_editing = false;

    protected $listeners = [ 'refresh' => '$refresh' ];

    public function render()
    {
        $this->reply->load('user');
        return view('livewire.show-reply');
    }

    public function postChild(){


        if( ! is_null($this->reply->reply_id) ) return ;

        $this->validate([
            'body' => 'required'
        ]);

        $saved = auth()->user()->replies()->create([
            'thread_id' => $this->reply->thread->id,
            'reply_id' => $this->reply->id,
            'body' => $this->body
        ]);

        logger('created' . $saved);
        logger($this->reply);
        logger($this->body);
        $this->body = '';
        $this->is_creating = false;

        $this->dispatch('refresh')->self(); // Este método debe funcionar en Livewire
    }

    public function updatedIsEditing(){
        if($this->is_editing){
            $this->authorize('update', $this->reply);

            $this->is_creating = false;
            $this->body = $this->reply->body;
        }
    }

    public function updatedIsCreating(){
        if($this->is_creating){
            $this->is_editing = false;
            $this->body = $this->reply->body;
        }
    }

    public function updateReply(){

        $this->authorize('update', $this->reply);

        $this->validate([
            'body' => 'required'
        ]);

        $this->reply->update([
            'body' => $this->body
        ]);

        $this->body = '';
        $this->is_editing = false;

        $this->dispatch('refresh')->self(); // Este método debe funcionar en Livewire
    }
}
