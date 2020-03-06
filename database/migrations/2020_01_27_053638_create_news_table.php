<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id')->nullable();
            $table->longText('headline')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(0);
            $table->string('author')->nullable();
            $table->longText('url')->nullable();
            $table->integer('popularity')->nullable();
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
        Schema::dropIfExists('news');
    }
}
