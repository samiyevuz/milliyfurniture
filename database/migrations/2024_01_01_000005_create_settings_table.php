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
        // Check if table doesn't exist before creating
        if (!Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->text('address')->nullable();
                $table->string('telegram')->nullable();
                $table->string('instagram')->nullable();
                $table->json('work_days')->nullable();
                $table->timestamps();
            });
        } else {
            // If table exists, check and add missing columns
            Schema::table('settings', function (Blueprint $table) {
                if (!Schema::hasColumn('settings', 'phone')) {
                    $table->string('phone')->nullable()->after('id');
                }
                if (!Schema::hasColumn('settings', 'email')) {
                    $table->string('email')->nullable()->after('phone');
                }
                if (!Schema::hasColumn('settings', 'address')) {
                    $table->text('address')->nullable()->after('email');
                }
                if (!Schema::hasColumn('settings', 'telegram')) {
                    $table->string('telegram')->nullable()->after('address');
                }
                if (!Schema::hasColumn('settings', 'instagram')) {
                    $table->string('instagram')->nullable()->after('telegram');
                }
                if (!Schema::hasColumn('settings', 'work_days')) {
                    $table->json('work_days')->nullable()->after('instagram');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
