<?php

namespace App\Http\Controllers;

use App\Actions\UpdatePostTags;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response|View {
        //
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
    public function store(Request $request, UpdatePostTags $updatePostTags): RedirectResponse {
        $newTags = Category::select('slug')->get()
            ->map(fn ($value) => $value->slug)
            ->merge([ $request->name ])
            ->toArray();

        $updatePostTags($newTags);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse {
        //
    }
}
