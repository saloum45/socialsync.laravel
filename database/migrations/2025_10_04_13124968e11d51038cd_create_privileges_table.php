<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
$table->string('description');

            $table->timestamps();
        });    }

    public function down()
    {
        Schema::dropIfExists('privileges');    }
};