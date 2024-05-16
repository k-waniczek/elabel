<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreWineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'volume' => 'required|numeric',
            'weight' => 'required|numeric',
            'vintage' => 'required|numeric|min_digits:4|max_digits:4',
            'type' => 'required|in:' . implode(',', config('app.wine_types')),
            'style' => 'required|in:' . implode(',', config('app.wine_styles')),
            'sugar_content' => 'required|in:' . implode(',', config('app.wine_sugar_contents')),
            'packaging_gases' => 'required|in:' . implode(',', config('app.gases')),
            'appellation' => 'required|alpha',
            'portion_volume' => 'required|numeric',
            'alcohol' => 'required|numeric',
            'residual_sugar' => 'required|numeric',
            'total_acidity' => 'required|numeric',
            'fat_total' => 'required|numeric',
            'fat_saturates' => 'required|numeric',
            'carbohydrate_total' => 'required|numeric',
            'carbohydrate_sugar' => 'required|numeric',
            'protein' => 'required|numeric',
            'salt' => 'required|numeric',
            'country' => 'required|size:2',
            'sku' => 'regex:/^(?=.*\d)(?=.*[a-z])[a-z\d]{6}$/i',
            'ean' => 'regex:/^(\d{12,14})$/'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field can\'t be empty',
            'volume.required' => 'Volume field can\'t be empty',
            'volume.numeric' => 'Volume field must be a number',
            'weight.required' => 'Weight field can\'t be empty',
            'weight.numeric' => 'Weight field must be a number',
            'vintage.required' => 'Vintage field can\'t be empty',
            'vintage.numeric' => 'Vintage field must be a number',
            'vintage.min_digits' => 'Vintage must be 4 digits long',
            'vintage.max_digits' => 'Vintage must be 4 digits long',
            'type.in' => 'Type must selected from the list',
            'style.in' => 'Style must be selected from the list',
            'sugar_content.in' => 'Sugar content must be selected from the list',
            'packaging_gases.in' => 'Packaging gases must be selected from the list',
            'appellation.required' => 'Appellation field can\'t be empty',
            'portion_volume.required' => 'Portion volume field can\'t be empty',
            'portion_volume.numeric' => 'Portion volume field must be a number',
            'alcohol.required' => 'Alcohol field can\'t be empty',
            'alcohol.numeric' => 'Alcohol field must be a number',
            'residual_sugar.required' => 'Residual sugar field can\'t be empty',
            'residual_sugar.numeric' => 'Residual sugar field must be a number',
            'total_acidity.required' => 'Total acidity field can\'t be empty',
            'total_acidity.numeric' => 'Total acidity field must be a number',
            'fat_total.required' => 'Fat total field can\'t be empty',
            'fat_total.numeric' => 'Fat total field must be a number',
            'fat_saturates.required' => 'Fat saturates field can\'t be empty',
            'fat_saturates.numeric' => 'Fat saturates field must be a number',
            'carbohydrate_total.required' => 'Carbohydrate total field can\'t be empty',
            'carbohydrate_total.numeric' => 'Carbohydrate total field must be a number',
            'carbohydrate_sugar.required' => 'Carbohydrate sugar field can\'t be empty',
            'carbohydrate_sugar.numeric' => 'Carbohydrate sugar field must be a number',
            'protein.required' => 'Protein field can\'t be empty',
            'protein.numeric' => 'Protein field must be a number',
            'salt.required' => 'Salt field can\'t be empty',
            'salt.numeric' => 'Salt field must be a number',
            'country.required' => 'Country field can\'t be empty',
            'country.size' => 'Country can contain only 2 letters',
            'sku.regex' => 'You have to enter valid SKU number',
            'ean.regex' => 'You have to enter valid EAN number'
        ]; 
    }
}
