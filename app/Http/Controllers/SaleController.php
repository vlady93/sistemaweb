<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use App\Models\project;
use Illuminate\Http\Request;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use App\Models\Movimientos;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;


class SaleController extends Controller
{
    function __construct() 
    {
    $this->middleware('permission:ver-ingreso-material')->only('index');
    $this->middleware('permission:crear-ingreso-material', ['only' => ['create','store']]);
    $this->middleware('permission:editar-ingreso-material', ['only' => ['edit','update']]);
    $this->middleware('permission:detalle-ingreso-material', ['only' => ['show']]);
    $this->middleware('permission:borrar-ingreso-material', ['only' => ['destroy']]);
    $this->middleware('permission:pdf-ingreso-material', ['only' => ['pdf']]);
    }
    public function index()
    {
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    }
    public function create()
    {
        $clients=Project::where('status','CANCELED')->get();
        $products = Product::where('status', 'ACTIVE')->get();
        return view('admin.sale.create', compact('clients', 'products'));
    }
    public function store(StoreRequest $request)
    {   
        
        $project=project::find($request->project_id);
        
        $project->update(['status'=>'VALID']);
        
        $sale = Sale::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'sale_date'=>Carbon::now('America/Lima')
        ]);
        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key],
             "quantity"=>$request->quantity[$key], 
             "price"=>$request->price[$key],
             "tipo"=>'0');
        }
        $sale->saleDetails()->createMany($results);
        $sale->Movimiento()->createMany($results);
         
        
        return redirect()->route('sales.index');
    }
    public function show(Sale $sale)
    {
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }
        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));
    }
    public function edit(Sale $sale)
    {
        // $clients = Client::get();
        // return view('admin.sale.edit', compact('sale'));
    }
    public function update(UpdateRequest $request, Sale $sale)
    {
        // $sale->update($request->all());
        // return redirect()->route('sales.index');
    }
    public function destroy(Sale $sale)
    {
        // $sale->delete();
        // return redirect()->route('sales.index');
    }
    public function pdf(Sale $sale)
    {
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity * $saleDetail->price;
        }

        $pdf = PDF::loadView('admin.sale.pdf',compact('sale','subtotal','saleDetails'));

        return $pdf->stream('Reporte_de_venta.pdf');
    }
}
