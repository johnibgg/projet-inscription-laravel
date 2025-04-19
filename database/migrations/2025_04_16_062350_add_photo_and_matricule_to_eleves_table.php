<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('eleves', function (Blueprint $table) {
            if (!Schema::hasColumn('eleves', 'photo')) {
                $table->string('photo')->nullable()->after('sexe');
            }

            if (!Schema::hasColumn('eleves', 'matricule')) {
                $table->string('matricule')->unique()->after('photo');
            }
        });
    }

    public function down(): void
    {
        Schema::table('eleves', function (Blueprint $table) {
            $table->dropColumn(['photo', 'matricule']);
        });
    }
};
