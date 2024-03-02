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
            $table->integer('id')->primary();
            $table->string('title', 256)->nullable();
            $table->string('concept', 45)->nullable();
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->text('statblock')->nullable()->comment("markdown");
            $table->string('imageurl', 256)->nullable();
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
