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
        Schema::table('testimonials', function (Blueprint $table) {
            // Check and add missing columns
            if (!Schema::hasColumn('testimonials', 'title')) {
                $table->string('title')->after('id');
            }
            
            if (!Schema::hasColumn('testimonials', 'description')) {
                $table->text('description')->after('title');
            }
            
            if (!Schema::hasColumn('testimonials', 'image')) {
                $table->string('image')->nullable()->after('description');
            }
            
            if (!Schema::hasColumn('testimonials', 'step_number')) {
                $table->integer('step_number')->default(1)->after('image');
            }
            
            if (!Schema::hasColumn('testimonials', 'status')) {
                $table->boolean('status')->default(true)->after('step_number');
            }
            
            if (!Schema::hasColumn('testimonials', 'order')) {
                $table->integer('order')->default(0)->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            // Don't drop columns in down method to preserve data
        });
    }
};
