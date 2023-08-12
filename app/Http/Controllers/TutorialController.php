<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Inertia\Inertia;
use Inertia\Response;

class TutorialController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(): Response {
        $posts = Post::whereIn('tags', ['tutorial'])->value('id');

        // $paths = [
            // [ 'url' => route('posts.index'), 'title' => 'Tutorial' ],
            // [ 'title' => $posts[0]->title ],
        // ];

        return Inertia::render('Posts/Index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $tutorial): View {
        dd($tutorial);
    }
}
