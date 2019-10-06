<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Comment;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->integer('user_id');
            $table->integer('post_id');
            
            $table->timestamps();
        });

        Comment::create([
            'content' => 'Un commentaire',
            'user_id' => 1,
            'post_id' => 1,
        ]);
        Comment::create([
            'content' => 'Un commentaire',
            'user_id' => 1,
            'post_id' => 1,
        ]);
        Comment::create([
            'content' => 'Un commentaire',
            'user_id' => 1,
            'post_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
