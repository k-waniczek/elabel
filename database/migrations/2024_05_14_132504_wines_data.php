<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\WineStyle;
use App\Models\WineType;
use App\Models\WineSugarContent;
use App\Models\PackagingGases;
use App\Models\IngredientCategory;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Adding predefined wine styles
        WineStyle::truncate();
        foreach (config('app.wine_styles') as $style) {
            WineStyle::create(['style' => $style]);
        }

        //Adding predefined wine types
        WineType::truncate();
        foreach (config('app.wine_types') as $type) {
            WineType::create(['type' => $type]);
        }

        //Adding predefined wine sugar contents
        WineSugarContent::truncate();
        foreach (config('app.wine_sugar_contents') as $sugar_content) {
            WineSugarContent::create(['sugar_content' => $sugar_content]);
        }

        //Adding predefined ingredient categories
        IngredientCategory::truncate();
        foreach (config('app.ingredient_categories') as $category) {
            IngredientCategory::create(['name' => $category]);
        }
        
        //Adding predefined packaging gases
        PackagingGases::truncate();
        foreach (config('app.gases') as $gases) {
            PackagingGases::create(['gases' => $gases]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        WineStyle::truncate();
        WineType::truncate();
        WineSugarContent::truncate();
        IngredientCategory::truncate();
        PackagingGases::truncate();
    }
};
