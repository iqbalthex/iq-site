<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ {
  Factories\HasFactory,
  Model,
  Relations\BelongsTo,
  Relations\HasMany,
};

class Post extends Model {
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tags' => 'array',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter(Builder $query, string $keyword): void {
        $query->when($keyword,
            fn (Builder $query, string $keyword) =>
                $query->where('title', 'LIKE', "%$keyword%")
        );
    }
}
