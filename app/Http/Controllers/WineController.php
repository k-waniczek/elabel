<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wine;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreWineRequest;

class WineController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
        return redirect()->route('login')
                ->withErrors([
                'email' => 'Please login to access the wines list.',
            ])->onlyInput('email');
        }

        $wines = Wine::all();
        return view('wines.index', compact('wines'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWineRequest $request)
    {
        Wine::create($request->all());
        return redirect()->route('wines.index')
            ->with('success', 'Wine created successfully.');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        
        ]);
        $wine = Wine::find($id);
        $wine->update($request->all());
        return redirect()->route('wines.index')
            ->with('success', 'Wine updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wine = Wine::find($id);
        $wine->delete();
        return redirect()->route('wines.index')
        ->with('success', 'Wine deleted successfully');
    }
    // routes functions
    /**
     * Show the form for creating a new wine.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('wines.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wine = Wine::find($id);
        return view('wines.show', compact('wine'));
    }
    /**
     * Show the form for editing the specified wine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wine = Wine::find($id);
        return view('wines.edit', compact('wine'));
    }
}
