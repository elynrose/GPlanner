<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchesTable extends Migration
{
    public function up()
    {
        Schema::create('searches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('url')->nullable();
            $table->longText('photo_url')->nullable();
            $table->boolean('saved')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
