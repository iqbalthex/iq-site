<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response|View {
        // $posts = Post::all();
        $posts = [
            [ 'id' => 1, 'title' => 'title1', 'body' => 'body1' ],
            [ 'id' => 2, 'title' => 'title2', 'body' => 'body2' ],
        ];

        // return view('posts.index', compact('posts'));
        return Inertia::render('Posts/Index', compact(
            'posts'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse {
        //
    }
}
