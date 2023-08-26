<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Inertia\Inertia;
use Inertia\Response;

class TeacherController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(): Response {
        return Inertia::render('Teacher/Index');
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(): View {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(): View {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(): RedirectResponse {
        //
    }
}
