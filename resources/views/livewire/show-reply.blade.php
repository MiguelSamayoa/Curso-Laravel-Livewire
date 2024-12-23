<div>
    <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 hover:to-slate-800 mb-4">
        <div class="p-4 flex gap-4">
            <div>
                <img src="{{$reply->user->avatar()}}" alt="{{$reply->user->name}}" class="rounded-md">
            </div>
            <div class="w-full">
                <p class="mb-4 text-blue-600 font-semibold text-xs">
                    {{$reply->user->name}}
                    <span class="text-white/60">{{ $reply->created_at->diffForHumans() }}</span>
                </p>

                @if ($is_editing)
                    <form wire:submit.prevent="updateReply" class="my-4">
                        <input
                            type="text"
                            placeholder="Escribe tu respuesta..."
                            class=" bg-gradient-to-r from-slate-800 to-slate-900 rounded-xl border-1 border-slate-900 w-full p-3 text-white/60 text-xs"
                            wire:model.defer="body"
                            >
                    </form>
                @else
                    <p class="text-white/60">
                        {{$reply->body}}
                    </p>
                @endif

                @if ($is_creating)
                    <form wire:submit.prevent="postChild" class="my-4">
                        <input
                            type="text"
                            placeholder="Escribe tu respuesta..."
                            class=" bg-gradient-to-r from-slate-800 to-slate-900 rounded-xl border-1 border-slate-900 w-full p-3 text-white/60 text-xs"
                            wire:model.defer="body"
                            >
                    </form>
                @endif

                <p class="mt-4 text-xs text-white/60 flex gap-2 justify-end">
                    @if ( is_null($reply->reply_id) )
                        <a href="#" wire:click.prevent='$toggle("is_creating")' class="hover:text-white">Responder</a>
                    @endif

                    @can('update', $reply)
                        <a href="" wire:click.prevent='$toggle("is_editing")' class="hover:text-white">Editar</a>
                    @endcan

                </p>
            </div>
        </div>
    </div>

    @foreach ($reply->replies as $reply)
        <div class="ml-10">
            @livewire('show-reply', ['reply' => $reply], key('reply-' . $reply->id))
        </div>
    @endforeach
</div>
