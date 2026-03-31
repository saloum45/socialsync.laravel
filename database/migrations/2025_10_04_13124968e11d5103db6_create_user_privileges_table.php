<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_privileges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
$table->unsignedBigInteger('id_privilege');
$table->foreign('id_privilege')->references('id')->on('privileges')->onDelete('cascade')->onUpdate('cascade');
$table->unsignedBigInteger('id_entreprise');
$table->foreign('id_entreprise')->references('id')->on('entreprises')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });    }

    public function down()
    {
        Schema::dropIfExists('user_privileges');    }
};