<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); // ユーザーID
            $table->string('name', 255); // ユーザー名
            $table->string('email', 255)->unique(); // メールアドレス
            $table->string('password', 255); // パスワード
            $table->string('bio', 255)->nullable(); // 自己紹介
            $table->string('image', 255)->nullable()->default('dawn.png'); // ユーザーアイコン
            $table->string('remember_token', 255)->nullable(); // リメンバートークン
            $table->timestamp('created_at')->useCurrent(); // レコード登録時間
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // レコード更新時間
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
