<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wine;
use App\Models\WineStyle;
use App\Models\WineType;
use App\Models\WineSugarContent;
use App\Models\PackagingGases;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreWineRequest;

class WineController extends Controller
{
    private function getKilocalorieFromWine(array $wine) {
        return ((7.9 * floatval($wine['alcohol'])) * 7) + (floatval($wine['residual_sugar']) * 4) + (floatval($wine['total_acidity']) * 4);
    }

    private function kilocalorieToKilojoules(int $kilocalorie) {
        return round(4.184 * $kilocalorie, 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wines = Wine::where('user_id', Auth::id())->get();
        return view('wines.index', compact('wines'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\StoreWineReqest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWineRequest $request)
    {
        $data = $request->all();
        $kilocalorie = $this->getKilocalorieFromWine($data);
        $wine_type = WineType::where('type', $data['type'])->get()[0]->id;
        $wine_style = WineStyle::where('style', $data['style'])->get()[0]->id;
        $wine_sugar_content = WineSugarContent::where('sugar_content', $data['sugar_content'])->get()[0]->id;
        $packaging_gases = PackagingGases::where('gases', $data['packaging_gases'])->get()[0]->id;
        $data['type'] = $wine_type;
        $data['style'] = $wine_style;
        $data['sugar_content'] = $wine_sugar_content;
        $data['packaging_gases'] = $packaging_gases;
        $data = array_map(fn($x) => $x == 'on' ? $x = 1 : $x, $data);
        Wine::create([
            ...$data, 
            'kilocalorie' => $kilocalorie, 
            'kilojoule' => $this->kilocalorieToKilojoules($kilocalorie),
            'user_id' => Auth::id()
        ]);
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
