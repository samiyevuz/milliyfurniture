<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, check if 'text' column exists and rename it to 'description'
        if (Schema::hasColumn('testimonials', 'text') && !Schema::hasColumn('testimonials', 'description')) {
            DB::statement('ALTER TABLE testimonials CHANGE COLUMN text description TEXT NOT NULL DEFAULT ""');
        }
        
        // If 'text' exists but 'description' also exists, drop 'text'
        if (Schema::hasColumn('testimonials', 'text') && Schema::hasColumn('testimonials', 'description')) {
            Schema::table('testimonials', function (Blueprint $table) {
                $table->dropColumn('text');
            });
        }
        
        // Ensure all columns have proper defaults
        Schema::table('testimonials', function (Blueprint $table) {
            // Add missing columns
            if (!Schema::hasColumn('testimonials', 'title')) {
                $table->string('title')->default('')->after('id');
            }
            
            if (!Schema::hasColumn('testimonials', 'description')) {
                $table->text('description')->default('')->after('title');
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
        
        // Modify existing columns to have defaults (using raw SQL for better control)
        if (Schema::hasColumn('testimonials', 'title')) {
            DB::statement('ALTER TABLE testimonials MODIFY COLUMN title VARCHAR(255) NOT NULL DEFAULT ""');
        }
        
        if (Schema::hasColumn('testimonials', 'description')) {
            DB::statement('ALTER TABLE testimonials MODIFY COLUMN description TEXT NOT NULL DEFAULT ""');
        }
        
        if (Schema::hasColumn('testimonials', 'step_number')) {
            DB::statement('ALTER TABLE testimonials MODIFY COLUMN step_number INT NOT NULL DEFAULT 1');
        }
        
        if (Schema::hasColumn('testimonials', 'status')) {
            DB::statement('ALTER TABLE testimonials MODIFY COLUMN status TINYINT(1) NOT NULL DEFAULT 1');
        }
        
        if (Schema::hasColumn('testimonials', 'order')) {
            DB::statement('ALTER TABLE testimonials MODIFY COLUMN `order` INT NOT NULL DEFAULT 0');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Don't reverse to preserve data
    }
};
