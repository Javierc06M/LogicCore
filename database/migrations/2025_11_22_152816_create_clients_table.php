<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
          Schema::create('clients', function (Blueprint $table) {
            $table->id();

            // Tipo de cliente: persona o empresa
            $table->enum('type', ['PERSON', 'COMPANY'])->default('PERSON');

            // Tipo de documento
            $table->enum('document_type', ['DNI', 'CE', 'RUC', 'PASSPORT'])->nullable();

            // Número de documento
            $table->string('document_number', 20)->unique();

            // Datos para personas
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();

            // Datos para empresas
            $table->string('business_name')->nullable();

            // Datos de contacto
            $table->string('email')->nullable()->index();
            $table->string('phone', 20)->nullable()->index();
            $table->string('address')->nullable();

            // Ubicación (opcional)
            $table->string('district')->nullable();
            $table->string('province')->nullable();

            // Auditoría
            /* $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
 */
            // Estado del cliente
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
