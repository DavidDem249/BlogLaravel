<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Post;
class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string("slug");
            $table->text('content');
            $table->integer('counts_comments')->default(0);
            //$table->integer('category_id');
            $table->integer('user_id');
            $table->timestamps();
        });

        for($i=0;$i<10;$i++)
        {
            Post::create([
                'name' => 'Post '.$i,
                'slug' => 'Post_'.$i,
                'content' =>'Lorem Ipsum',
                'counts_comments' => 0,
                'category_id' => 1,
                'user_id' => 1,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
