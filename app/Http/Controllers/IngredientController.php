<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreIngredientRequest;

class IngredientController extends Controller
{
    private function transformFormData(array $request) {
        $data = $request;
        $data = array_map(fn($x) => $x == 'on' ? $x = 1 : $x, $data);
        $category = IngredientCategory::where('name', $data['category'])->get()[0]->id;
        $data['category'] = $category;
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::where('user_id', Auth::id())->where('custom', 1)->orWhere('custom', 0)->get();
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
        $data = $this->transformFormData($request->all());
        Ingredient::create([
            ...$data, 
            'user_id' => Auth::id(),
            'custom' => true,
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
        $data = $this->transformFormData($request->all());
        $ingredient = Ingredient::find($id);
        $ingredient->update($data);
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
        if ($ingredient->user_id != Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You can\'t access this page!');
        }
        $ingredient_category = IngredientCategory::where('id', $ingredient->category)->get()[0]->name;
        $ingredient->category = $ingredient_category;

        return view('ingredients.edit', compact('ingredient'));
    }

    public function delete_row($id) {
        $data=Post::find($id);

        $data->delete();

        return response()->json(['success'=>true, 'tr' => 'tr_'.$id]);
    }
}
