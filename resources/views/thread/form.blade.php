<div>
    <select
        name="category_id"
        class="bg-slate-800 border-1 rounded-3xl border-slate-900 w-full p-3 text-white/60 text-xs capitalize mb-5"
    >
        <option value=""> Seleccionar Categoria </option>

        @foreach ( $categories as $category)
            <option value="{{$category->id}}"
                @if ( old('category_id', $thread->category_id) == $category->id)
                    selected
                @endif> {{$category->name}} </option>
        @endforeach
    </select>

    <input
    type="text"
    name="title"
    placeholder="Titulo"
    class="bg-slate-800 border-1 rounded-3xl border-slate-900 w-full p-3 text-white/60 text-xs mb-5"
    wire:model.live="search"
    value="{{ old('body', $thread->title) }}"
    >

    <textarea
    rows="10"
    name="body"
    placeholder="Descripcion del Hilo"
    class="bg-slate-800 border-1 rounded-3xl border-slate-900 w-full p-3 text-white/60 text-xs mb-5"
    wire:model.live="search">
        {{ old('body', $thread->body) }}
    </textarea>
</div>
