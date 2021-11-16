<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;
class PurchaseController extends Controller
{
    function __construct() 
    {
    $this->middleware('permission:ver-salida-material')->only('index');
    $this->middleware('permission:crear-salida-material', ['only' => ['create','store']]);
    $this->middleware('permission:editar-salida-material', ['only' => ['edit','update']]);
    $this->middleware('permission:detalle-salida-material', ['only' => ['show']]);
    $this->middleware('permission:borrarsalida--material', ['only' => ['destroy']]);
    $this->middleware('permission:pdf-salida-material', ['only' => ['pdf','pdf-material']]);
    }
    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }
    public function create()
    {
        $providers = Provider::get();
        $products = Product::where('status', 'ACTIVE')->get();
        return view('admin.purchase.create', compact('providers','products'));
    }
    public function store(StoreRequest $request)
    {
        $purchase = Purchase::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'purchase_date'=>Carbon::now('America/Lima'),
        ]);
        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key],
             "price"=>$request->price[$key],
             "tipo"=>'1');
        }
        $purchase->purchaseDetails()->createMany($results);
        $purchase->Movimiento()->createMany($results);
        return redirect()->route('purchases.index');
    }
    public function show(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }
    
    public function edit(Purchase $purchase)
    {
        $providers = Provider::get();
        return view('admin.purchase.edit', compact('purchase'));
    }

    public function update(UpdateRequest $request, Purchase $purchase)
    {
        /* $purchase->update($request->all());
        return redirect()->route('purchases.index'); */
    }

   
    public function destroy(Purchase $purchase)
    {
        /* $purchase->delete();
        return redirect()->route('purchases.index'); */
    }
    public function pdf(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }

        $pdf = PDF::loadView('admin.purchase.pdf',compact('purchase','subtotal','purchaseDetails'));
      
        

        return $pdf->stream('Reporte_de_compra.pdf');
    }
}
