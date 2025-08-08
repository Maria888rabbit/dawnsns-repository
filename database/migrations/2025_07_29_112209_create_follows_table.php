<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->id(); // フォロー情報
            $table->unsignedBigInteger('user_id')->constrained(); // フォローされている側
            $table->unsignedBigInteger('follower_id');
            $table->foreign('follower_id')->references('id')->on('users');
            $table->timestamp('created_at')->useCurrent(); // レコード作成日時

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
