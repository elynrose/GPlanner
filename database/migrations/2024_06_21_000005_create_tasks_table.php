<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_code')->unique();
            $table->string('title');
            $table->longText('description');
            $table->string('due_date')->nullable();
            $table->string('call_to_action')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
