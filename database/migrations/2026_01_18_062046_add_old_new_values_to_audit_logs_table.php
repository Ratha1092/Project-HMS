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
    Schema::table('audit_logs', function (Blueprint $table) {

        if (!Schema::hasColumn('audit_logs', 'old_values')) {
            $table->json('old_values')->nullable()->after('auditable_id');
        }

        if (!Schema::hasColumn('audit_logs', 'new_values')) {
            $table->json('new_values')->nullable()->after('old_values');
        }

    });
}

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::table('audit_logs', function (Blueprint $table) {

        if (Schema::hasColumn('audit_logs', 'new_values')) {
            $table->dropColumn('new_values');
        }

        if (Schema::hasColumn('audit_logs', 'old_values')) {
            $table->dropColumn('old_values');
        }

    });
}
};