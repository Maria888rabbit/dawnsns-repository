<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // id (auto_increment)
            $table->unsignedBigInteger('user_id')->constrained(); // user_id
            $table->string('post', 400); // post
            $table->timestamp('created_at')->useCurrent(); // created_at
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // updated_at

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
