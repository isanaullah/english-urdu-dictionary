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
        Schema::table('advertisements', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn([
                'title',
                'image', 
                'link',
                'start_date',
                'end_date',
                'description',
                'sort_order'
            ]);
            
            // Add new columns
            $table->string('name')->after('id');
            $table->text('ad_code')->after('position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('advertisements', function (Blueprint $table) {
            // Drop new columns
            $table->dropColumn(['name', 'ad_code']);
            
            // Restore old columns
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
        });
    }
};
