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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employeename');
            $table->enum('gender', ['male', 'female']);
            $table->integer('age');
            $table->timestamp('dob');
            $table->decimal('salary', 20, 2)->default(0);
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->foreignId('departmentid')
                  ->constrained('departments')
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};