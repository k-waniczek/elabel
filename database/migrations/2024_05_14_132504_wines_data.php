<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\WineStyle;
use App\Models\WineType;
use App\Models\WineSugarContent;

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

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        WineStyle::truncate();
    }
};
