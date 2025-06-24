<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('libro_pdfs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_libro');
            $table->text('url_pdf'); // URL o ruta al PDF
            $table->timestamps();

            $table->foreign('id_libro')
    ->references('id')  // Cambia 'id_libro' por 'id' aquí
    ->on('libros')
    ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('libro_pdfs');
    }
};
