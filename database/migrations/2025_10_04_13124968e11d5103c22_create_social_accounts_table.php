<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entreprise');
$table->foreign('id_entreprise')->references('id')->on('entreprises')->onDelete('cascade')->onUpdate('cascade');
$table->unsignedBigInteger('id_user');
$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
$table->unsignedBigInteger('id_type_social_account');
$table->foreign('id_type_social_account')->references('id')->on('type_social_accounts')->onDelete('cascade')->onUpdate('cascade');
$table->string('account_id');
$table->string('account_name');
$table->string('access_token');
$table->string('refresh_token');
$table->string('expires_at');

            $table->timestamps();
        });    }

    public function down()
    {
        Schema::dropIfExists('social_accounts');    }
};