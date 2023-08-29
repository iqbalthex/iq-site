<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\ { Request, RedirectResponse };
use Illuminate\View\View;
use Inertia\ {Inertia, Response };

class TeacherController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(): Response {
        $user     = auth()->user();
        $teachers = $user->teachers;
        $classrooms = [];

        $classroomIds = $teachers->map(fn ($teacher) => $teacher->classroom_id);
        $subjects   = $teachers->map(fn ($teacher) => [
            'id'   => $teacher->subject_id,
            'name' => $teacher->subject->name,
        ]);

        return Inertia::render('Teacher/Index', compact(
            'user', 'classroomIds', 'subjects',
        ));
    }
}
