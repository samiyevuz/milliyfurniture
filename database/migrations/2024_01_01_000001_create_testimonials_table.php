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
        if (!Schema::hasTable('testimonials')) {
            Schema::create('testimonials', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description');
                $table->string('image')->nullable();
                $table->integer('step_number')->default(1);
                $table->boolean('status')->default(true);
                $table->integer('order')->default(0);
                $table->timestamps();
            });
        } else {
            // If table exists, check and add missing columns
            Schema::table('testimonials', function (Blueprint $table) {
                if (!Schema::hasColumn('testimonials', 'order')) {
                    $table->integer('order')->default(0)->after('status');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
