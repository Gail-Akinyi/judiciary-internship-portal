<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'hr_officer', 'supervisor', 'intern'])
                  ->default('intern')
                  ->after('email');
            $table->string('phone')->nullable()->after('role');
            $table->string('university')->nullable()->after('phone');
            $table->string('course')->nullable()->after('university');
            $table->boolean('is_active')->default(true)->after('course');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'phone', 'university', 'course', 'is_active']);
        });
    }
};
