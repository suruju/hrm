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
        Schema::table('attendances', function (Blueprint $table) {
            $table->string('login_lgn')->nullable();
            $table->string('login_lat')->nullable();
            $table->string('login_accuracy')->nullable();
            $table->string('logout_lgn')->nullable();
            $table->string('logout_lat')->nullable();
            $table->string('logout_accuracy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn('login_lgn');
            $table->dropColumn('login_lat');
            $table->dropColumn('login_accuracy');
            $table->dropColumn('logout_lgn');
            $table->dropColumn('logout_lat');
            $table->dropColumn('logout_accuracy');
        });
    }
};
