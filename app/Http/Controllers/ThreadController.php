<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ThreadController extends Controller
{
    use AuthorizesRequests;

    public function edit(Thread $thread){
        $this->authorize('update', $thread);

        $categories = Category::all();
        return view('thread.edit', compact('categories', 'thread'));
    }

    public function update(Request $request, Thread $thread){
        $this->authorize('update', $thread);

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $thread->update($request->all());
        return redirect()->route('thread', $thread);
    }

    public function create(Thread $thread){
        $categories = Category::all();
        return view('thread.create', compact('categories', 'thread'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        auth()->user()->threads()->create($request->all());
        return redirect()->route('dashboard');
    }
}
