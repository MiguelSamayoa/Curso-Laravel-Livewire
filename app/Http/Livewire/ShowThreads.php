<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Thread;

class ShowThreads extends Component
{
    public $search = '';

    // En tu componente Livewire
    public $category = []; // Asegúrate de inicializar como array

    public function filterByCategory($category)
    {
        if (in_array($category, $this->category)) {
            // Si la categoría ya está en el array, la eliminamos
            $this->category = array_filter($this->category, fn($cat) => $cat != $category);
        } else {
            // Si no está en el array, la añadimos
            $this->category[] = $category;
        }

        logger("Category filter updated: " . implode(', ', $this->category));
    }

    public function render()
    {

        $categories = Category::get();
        $threads = Thread::query();
        $threads->where('title', 'like', "%$this->search%");

        if ($this->category) {
            $threads->WhereIn('category_id', $this->category);
        }
        $threads->with('user', 'category');
        $threads->withCount('replies')->orderBy('created_at', 'desc');

        return view('livewire.show-threads', [
            'categories' => $categories,
            'threads' => $threads->get(),
        ])->layout('layouts.app');
    }

}
