<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIngredientRequest extends FormRequest
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
            'category' => 'required|in:' . implode(',', config('app.ingredient_categories')),
            'enumber' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field can\'t be empty',
            'category.in' => 'Category must be choosed from the list',
            'enumber.numeric' => 'E-Number field must be a number',
        ]; 
    }
}
