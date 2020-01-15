<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('author');
            $table->string('approval');            
            $table->string('tags');
            $table->string('category');
            $table->string('category_sub');  
            $table->boolean('visible');
            $table->boolean('checked');                                                                   
            $table->string('article_file'); 
            $table->string('backup_file');
            $table->string('attach_file');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
