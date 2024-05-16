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

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\PdfWriter;
use Endroid\QrCode\Writer\SvgWriter;

class WineController extends Controller
{
    private function getKilocalorieFromWine(array $wine) {
        return ((7.9 * floatval($wine['alcohol'])) * 7) + (floatval($wine['residual_sugar']) * 4) + (floatval($wine['total_acidity']) * 4);
    }

    private function kilocalorieToKilojoules(int $kilocalorie) {
        return round(4.184 * $kilocalorie, 1);
    }

    private function transformFormData(array $request) {
        $data = $request;
        $wine_type = WineType::where('type', $data['type'])->get()[0]->id;
        $wine_style = WineStyle::where('style', $data['style'])->get()[0]->id;
        $wine_sugar_content = WineSugarContent::where('sugar_content', $data['sugar_content'])->get()[0]->id;
        $packaging_gases = PackagingGases::where('gases', $data['packaging_gases'])->get()[0]->id;
        $data['type'] = $wine_type;
        $data['style'] = $wine_style;
        $data['sugar_content'] = $wine_sugar_content;
        $data['packaging_gases'] = $packaging_gases;
        $data = array_map(fn($x) => $x == 'on' ? $x = 1 : $x, $data);
        return $data;
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
        $data = $this->transformFormData($request->all());
        $kilocalorie = $this->getKilocalorieFromWine($data);
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
     * @param  App\Http\Request\StoreWineReqest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWineRequest $request, $id)
    {
        $data = $this->transformFormData($request->all());
        $kilocalorie = $this->getKilocalorieFromWine($data);
        $wine = Wine::find($id);
        $wine->update($data);
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
        $wine_type = WineType::where('id', $wine->type)->get()[0]->type;
        $wine_style = WineStyle::where('id', $wine->style)->get()[0]->style;
        $wine_sugar_content = WineSugarContent::where('id', $wine->sugar_content)->get()[0]->sugar_content;
        $packaging_gases = PackagingGases::where('id', $wine->packaging_gases)->get()[0]->gases;
        $wine->type = $wine_type;
        $wine->style = $wine_style;
        $wine->sugar_content = $wine_sugar_content;
        $wine->packaging_gases = $packaging_gases;

        return view('wines.edit', compact('wine'));
    }

    public function view($id) {
        $wine = Wine::find($id);
        return view('wines.show', compact('wine'));
    }

    public function generate($id, $format) 
    {
        $path = __DIR__.'/../../../resources/files/';
        switch (strtolower($format)) {
            case 'png':
                $result = Builder::create()
                    ->writer(new PngWriter())
                    ->writerOptions([])
                    ->data('Custom QR code contents')
                    ->encoding(new Encoding('UTF-8'))
                    ->errorCorrectionLevel(ErrorCorrectionLevel::High)
                    ->size(300)
                    ->margin(10)
                    ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
                    ->validateResult(false)
                    ->build();

                $file_name = $path . 'qr.png';
                file_put_contents($file_name, $result->getString());
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=qr.png");
                header("Content-Type: image/png");
                header("Content-Transfer-Encoding: binary");
                readfile($file_name);
                exit;
                break;
            case 'svg':
                $result = Builder::create()
                    ->writer(new SvgWriter())
                    ->writerOptions([])
                    ->data('Custom QR code contents')
                    ->encoding(new Encoding('UTF-8'))
                    ->errorCorrectionLevel(ErrorCorrectionLevel::High)
                    ->size(300)
                    ->margin(10)
                    ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
                    ->validateResult(false)
                    ->build();

                $file_name = $path . 'qr.svg';
                file_put_contents($file_name, $result->getString());
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=qr.svg");
                header("Content-Type: image/xml+svg");
                header("Content-Transfer-Encoding: binary");
                readfile($file_name);
                exit;
                break;
            case 'pdf':
                $result = Builder::create()
                    ->writer(new PdfWriter())
                    ->writerOptions([])
                    ->data('Custom QR code contents')
                    ->encoding(new Encoding('UTF-8'))
                    ->errorCorrectionLevel(ErrorCorrectionLevel::High)
                    ->size(300)
                    ->margin(10)
                    ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
                    ->validateResult(false)
                    ->build();

                $file_name = $path . 'qr.pdf';
                file_put_contents($file_name, $result->getString());
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=qr.pdf");
                header("Content-Type: application/pdf");
                header("Content-Transfer-Encoding: binary");
                readfile($file_name);
                exit;
                break;
            default:
                echo 'Unsupported format!';
                break;
        }        

        echo "<script>window.close()</script>";
    }  
}
