<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreIngredientRequest;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::where('user_id', Auth::id())->get();
        return view('ingredients.index', compact('ingredients'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\StoreIngredientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIngredientRequest $request)
    {
        Ingredient::create([
            ...$request->all(), 
            'user_id' => Auth::id()
        ]);
        return redirect()->route('ingredients.index')
            ->with('success', 'Ingredients created successfully.');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Request\StoreIngredientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreIngredientRequest $request, $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->update($request->all());
        return redirect()->route('ingredients.index')
            ->with('success', 'Ingredient updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->delete();
        return redirect()->route('ingredients.index')
        ->with('success', 'Ingredient deleted successfully');
    }
    // routes functions
    /**
     * Show the form for creating a new ingredient.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('ingredients.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredient = Ingredient::find($id);
        return view('ingredients.show', compact('ingredient'));
    }
    /**
     * Show the form for editing the specified ingredient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient_category = IngredientCategory::where('id', $ingredient->category)->get()[0]->name;
        $ingredient->category = $ingredient_category;

        return view('ingredients.edit', compact('ingredient'));
    }
}
