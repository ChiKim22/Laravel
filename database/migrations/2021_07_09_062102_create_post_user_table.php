<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //onDelete = 글 삭제시 연관된 것도 같이 제거.
             // constrained 를 사용해 네이밍 콘벤션을 따라 해석하게 됨.
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            // 언제 조회했는지 조회
            $table->timestamp('created_at'); // 마지막 조회 시간
            $table->unique(['user_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_user');
    }
}
