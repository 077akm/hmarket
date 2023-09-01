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
        Schema::table('scoring_documents', function (Blueprint $table) {
            $table->boolean('is_correct')->default(false);
            $table->integer('score')->default(0);
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade'); // Добавляем эту строку для автоматического удаления связанных записей
        });
    }

    public function down()
    {
        Schema::table('scoring_documents', function (Blueprint $table) {
            $table->dropForeign(['document_id']);
            $table->dropColumn('document_id');
            $table->dropColumn('score');
            $table->dropColumn('is_correct');
        });
    }
};
