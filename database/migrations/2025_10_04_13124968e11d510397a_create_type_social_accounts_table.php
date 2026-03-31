<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('type_social_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
$table->string('logo');
$table->string('lien');

            $table->timestamps();
        });    }

    public function down()
    {
        Schema::dropIfExists('type_social_accounts');    }
};