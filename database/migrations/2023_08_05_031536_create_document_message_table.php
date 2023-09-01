<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_message', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->boolean('active')->default(true);
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('text');
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_message');
    }
};
