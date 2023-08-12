<?php

namespace App\Actions;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostTags {
    public function __invoke(array $tags): void {
        Schema::table('posts', fn (Blueprint $table) =>
            $table->set('tags', $tags)->nullable()->change()
        );
    }
}
