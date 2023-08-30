<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\ {
  Request,
  RedirectResponse
};
use Illuminate\View\View;
use Inertia\ {
  Inertia,
  Response
};

class TeacherController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(): Response {
        $user = auth()->user();

        $classrooms = $user->teachers->map(function ($teacher) {
            $cls  = $teacher->classroom;

            return [
                'id'   => $cls->id,
                'code' => $cls->code,
                'student_count' => $cls->students->count(),

                'subjects' => $teacher->subjects,
            ];
        });

        return Inertia::render('Teacher/Index', compact(
            'user', 'classrooms',
        ));
    }

    public function getStudents(Classroom $classroom) {
        return response($classroom->students, 200);
    }
}
