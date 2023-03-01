<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('thumb_1')->nullable();
            $table->string('thumb_2')->nullable();
            $table->string('thumb_3')->nullable();
            $table->string('thumb_4')->nullable();
            $table->string('slug');
            $table->string('description');
            $table->string('code');
            $table->string('size');
            $table->float('price');
            $table->integer('number_of_pages');
            $table->smallInteger('status')->default(1);
            $table->unsignedBigInteger('category_id');
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
        Schema::dropIfExists('books');
    }
};
