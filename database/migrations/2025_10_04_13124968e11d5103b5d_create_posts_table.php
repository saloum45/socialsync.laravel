<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entreprise');
$table->foreign('id_entreprise')->references('id')->on('entreprises')->onDelete('cascade')->onUpdate('cascade');
$table->unsignedBigInteger('id_user');
$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
$table->string('contenu');
$table->string('scheduled_at');
$table->string('status');
$table->string('media_url');
$table->string('media');

            $table->timestamps();
        });    }

    public function down()
    {
        Schema::dropIfExists('posts');    }
};