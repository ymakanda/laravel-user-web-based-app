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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name');
            $table->string('id_numder', 13)->unique();
            $table->string('mobile_number', 10);
            $table->date('birth_date')->after('email');
            $table->string('language');
            $table->json('interests');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('id_numder');
            $table->dropColumn('mobile_number');
            $table->dropColumn('birth_date');
            $table->dropColumn('language');
            $table->dropColumn('interests');
        });
    }
};
