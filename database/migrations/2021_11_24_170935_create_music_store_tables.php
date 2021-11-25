<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicStoreTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create table artists that contains the artist's name
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        
        // create table genres that contains the name
        Schema::create('genres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // create table albums that contains title,price,cove_photo ,foreign key to genre_id and a foreign key to artists_id
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->decimal('price',$precision = 8,$scale = 2);
            $table->string('cover_photo');
            $table->integer('genre_id')->unsigned();
            $table->integer('artist_id')->unsigned();
            $table->timestamps();

            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->unique(['title', 'artist_id']);

        });


        // create table track that includes title,duration,album_id,foreign key to album_id
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('number');
            $table->integer('album_id')->unsigned();
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
        Schema::dropIfExists('albums');
        Schema::dropIfExists('artists');
        Schema::dropIfExists('genres');
    }
}
