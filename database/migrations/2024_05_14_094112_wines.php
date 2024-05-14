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
        Schema::create('wines', function(Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->integer('volume');
            $table->integer('weight');
            $table->integer('vintage');
            $table->integer('type');
            $table->integer('style');
            $table->string('appellation');
            $table->float('portion_volume')->default(100.0);
            $table->float('kilocalorie');
            $table->float('fat_total');
            $table->float('fat_saturates');
            $table->float('carbohydrate_total');
            $table->float('carbohydrate_sugar');
            $table->float('protein');
            $table->float('salt');
            $table->boolean('warning_drinking_during_pregnancy')->default(false);
            $table->boolean('warning_drinking_below_legal_age')->default(false);
            $table->boolean('warning_drinking_when_driving')->default(false);
            $table->boolean('certifications_organic')->default(false);
            $table->boolean('certifications_vegetarian')->default(false);
            $table->boolean('certifications_vegan')->default(false);
            $table->string('country');
            $table->string('sku');
            $table->string('ean');
            $table->timestamps();
        });

        Schema::create('ingredients', function(Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->integer('category');
            $table->integer('enumber');
            $table->boolean('allergen');
            $table->boolean('custom');
            $table->timestamps();
        });

        Schema::create('ingredient_categories', function(Blueprint $table) {
            $table->id()->primary();
            $table->enum('name', [
                'Other igredient', 
                'Acidity regulator', 
                'Antioxidant', 
                'Clarifying agent',
                'Correction of defect',
                'Enrichment substance',
                'Enzyme',
                'Activators of alcoholic and malolactic fermentation',
                'Fermentation agent',
                'Gases and packaging gas',
                'Preservative',
                'Raw material',
                'Sequestrant',
                'Stabiliser',
                'Sweetener'
            ]);
        });

        Schema::create('wine_types', function(Blueprint $table) {
            $table->id()->primary();
            $table->enum('type', [
                'White', 
                'Red', 
                'Rosé', 
                'Sparkling', 
                'Fortified', 
                'Orange'
            ]);
        });

        Schema::create('wine_styles', function(Blueprint $table) {
            $table->id()->primary();
            $table->enum('style', [
                'Dry', 
                'Medium dry', 
                'Medium sweet', 
                'Sweet'
            ]);
        });

        Schema::create('wine_2_ingredient', function(Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('wine_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('wine_id')->references('id')->on('wines');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wines');
        Schema::dropIfExists('wine_types');
        Schema::dropIfExists('wine_styles');
        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('ingredient_categories');
        Schema::dropIfExists('wine_2_ingredient');
    }
};
