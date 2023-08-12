<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ {
  Factories\HasFactory,
  Model,
  Relations\BelongsTo,
  SoftDeletes,
};

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
}
