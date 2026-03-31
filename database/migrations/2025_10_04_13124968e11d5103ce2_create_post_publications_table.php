<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('post_publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entreprise');
$table->foreign('id_entreprise')->references('id')->on('entreprises')->onDelete('cascade')->onUpdate('cascade');
$table->unsignedBigInteger('id_user');
$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
$table->string('post_id');
$table->unsignedBigInteger('id_social_account');
$table->foreign('id_social_account')->references('id')->on('social_accounts')->onDelete('cascade')->onUpdate('cascade');
$table->string('platform_post_id');
$table->string('status');
$table->string('published_at');

            $table->timestamps();
        });    }

    public function down()
    {
        Schema::dropIfExists('post_publications');    }
};