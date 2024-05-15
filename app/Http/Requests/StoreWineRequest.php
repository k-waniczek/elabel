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
            'name.required' => 'Name required',
            'volume.required' => 'Volume required',
            'volume.numeric' => 'Volume numeric',
            'weight.required' => 'Weight required',
            'weight.numeric' => 'Weight numeric',
            'vintage.required' => 'Vintage required',
            'vintage.numeric' => 'Vintage numeric',
            'vintage.min_digits' => 'Vintage min digits',
            'vintage.max_digits' => 'Vintage max digits',
            'type.in' => 'Type in',
            'style.in' => 'Style in',
            'sugar_content.in' => 'Sugar content in',
            'packaging_gases.in' => 'Packaging gases in',
            'appellation.required' => 'Appellation required',
            'appellation.alpha' => 'Appellation alpha',
            'portion_volume.required' => 'Portion volume required',
            'portion_volume.numeric' => 'Portion volume numeric',
            'alcohol.required' => 'Alcohol required',
            'alcohol.numeric' => 'Alcohol numeric',
            'residual_sugar.required' => 'Residual sugar required',
            'residual_sugar.numeric' => 'Residual sugar numeric',
            'total_acidity.required' => 'Total acidity required',
            'total_acidity.numeric' => 'Total acidity numeric',
            'fat_total.required' => 'Fat total required',
            'fat_total.numeric' => 'Fat total numeric',
            'fat_saturates.required' => 'Fat saturates required',
            'fat_saturates.numeric' => 'Fat saturates numeric',
            'carbohydrate_total.required' => 'Carbohydrate total required',
            'carbohydrate_total.numeric' => 'Carbohydrate total numeric',
            'carbohydrate_sugar.required' => 'Carbohydrate sugar required',
            'carbohydrate_sugar.numeric' => 'Carbohydrate sugar numeric',
            'protein.required' => 'Protein required',
            'protein.numeric' => 'Protein numeric',
            'salt.required' => 'Salt required',
            'salt.numeric' => 'Salt numeric',
            'country.required' => 'Country required',
            'country.size' => 'Country size',
            'sku.regex' => 'SKU regex',
            'ean.regex' => 'EAN regex'
        ]; 
    }
}
