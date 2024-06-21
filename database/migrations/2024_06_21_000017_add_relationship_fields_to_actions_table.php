<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActionsTable extends Migration
{
    public function up()
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->unsignedBigInteger('mods_id')->nullable();
            $table->foreign('mods_id', 'mods_fk_9890036')->references('id')->on('mods');
        });
    }
}
