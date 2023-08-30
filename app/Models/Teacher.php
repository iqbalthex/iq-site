<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ {
  Factories\HasFactory,
  Model,
  Relations\BelongsTo,
  Relations\BelongsToMany,
};

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function classroom(): BelongsTo {
        return $this->belongsTo(Classroom::class);
    }

    public function subjects(): BelongsToMany {
        return $this->belongsToMany(Subject::class);
    }
}
