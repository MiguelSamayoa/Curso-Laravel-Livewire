<div class="max-w-4xl mx-auto px-4 sm:px-6 lg-px-8 py-12">
    <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 mb-4">
        <div class="p-4 flex gap-4">
            <div>
                <img src="{{$thread->user->avatar()}}" alt="{{$thread->user->name}}" class="rounded-md">
            </div>
            <div class="w-full">
                <h2 class="mb-4 flex items-start justify-between text-white">
                    <a href="{{route('thread', $thread)}}" class="text-xl font-semibold text-white/80 hover:text-white">{{ $thread->title }}</a>
                    <div>
                        <span class="rounded-full text-xs py-2 px-4 capitalize" style="color: {{$thread->category->color}}; border: 1px solid {{$thread->category->color}};">
                            {{$thread->category->name}}
                        </span>
                    </div>
                </h2>
                <p class="mb-4 text-blue-600 font-semibold text-xs">
                    {{$thread->user->name}}
                    <span class="text-white/60">{{ $thread->created_at->diffForHumans() }}</span>
                </p>

                <p class="text-white/60">
                    {{$thread->body}}
                </p>
            </div>
        </div>
    </div>

    @foreach ($replies as $reply)
        @livewire('show-reply', ['reply' => $reply], key('reply-' . $reply->id))
    @endforeach

    <form wire:submit.prevent="postReply" class="mb-4">
        <input
            type="text"
            placeholder="Escribe tu respuesta..."
            class=" bg-gradient-to-r from-slate-800 to-slate-900 rounded-xl border-0 w-full p-3 text-white/60 text-xs"
            wire:model.live="body"
            >
    </form>
</div>
