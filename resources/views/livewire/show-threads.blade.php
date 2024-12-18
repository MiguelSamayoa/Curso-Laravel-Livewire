<div class="max-w-7xl mx-auto px-4 sm:px-6 lg-px-8 flex gap-10 py-12">
    <div class="w-64">

        <a
        href="{{route('threads.create')}}"
        class="block w-full py-4 mb-10 bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white/90 font-bold text-xs text-center rounded-md">
            Preguntar
        </a>
        <ul>
            @foreach ($categories as $category )
                <li class="mb-2">
                    <a href="#" wire:click.prevent="filterByCategory({{ $category->id }})" class="p-2 rounded-md flex bg-slate-800 items-center gap-2 text-white/60 hover:text-white font-semiblod text-xs capitalize">
                        <span class="w-2 h-2 rounded-full" style="background-color: {{ $category->color }}"></span>
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
            <li class="mb-2">
                <a href="#" wire:click.prevent="filterByCategory('all')" class="p-2 rounded-md flex bg-slate-800 items-center gap-2 text-white/60 hover:text-white font-semiblod text-xs capitalize">
                    <span class="w-2 h-2 rounded-full bg-slate-900"></span>
                    Todas las categorias
                </a>
            </li>
        </ul>
    </div>

    <div class="w-full">
        <form action="" class="mb-4">
            <input
                type="text"
                placeholder="// ..."
                class=" bg-gradient-to-r from-slate-800 to-slate-900 rounded-3xl border-0 w-1/3 p-3 text-white/60 text xs"
                wire:model.live="search"
                >
        </form>
        @foreach ($threads as $thread )
            <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 hover:to-slate-800 mb-4">
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
                        <p class="flex px-5 items-center justify-between w-full text-xs">
                            <span class="text-blue-600 font-semibold">
                                {{$thread->user->name}}
                                <span class="text-white/60">{{ $thread->created_at->diffForHumans() }}</span>
                            </span>
                            <span class="flex items-center gap-1 text-slate-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-4.03a48.527 48.527 0 0 1-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979Z" />
                                    <path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 0 0 1.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0 0 15.75 7.5Z" />
                                  </svg>

                                {{$thread->replies_count}}
                                Respuesta{{$thread->replies_count > 1 ? 's' : ''}}

                                @can('update', $thread)
                                    | <a href=" {{ route( 'threads.edit', $thread ) }} " class="hover:text-white">Editar</a>
                                @endcan
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
