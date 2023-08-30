<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ {
  Factories\HasFactory,
  Model,
};

class SubjectTeacher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'subject_teacher';
}
