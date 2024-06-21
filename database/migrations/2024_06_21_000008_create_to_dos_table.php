<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToDosTable extends Migration
{
    public function up()
    {
        Schema::create('to_dos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item')->nullable();
            $table->date('due_date')->nullable();
            $table->boolean('completed')->default(0)->nullable();
            $table->boolean('saved')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
