<?php

namespace App\Http\Controllers;


use App\Models\Provider;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Sale;
use App\Models\SaleDetails;
use Barryvdh\DomPDF\Facade as PDF;

class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-material')->only('index');
         $this->middleware('permission:crear-material', ['only' => ['create','store']]);
         $this->middleware('permission:editar-material', ['only' => ['edit','update']]);
         $this->middleware('permission:detalle-material', ['only' => ['show']]);
         $this->middleware('permission:borrar-material', ['only' => ['destroy']]);
         $this->middleware('permission:pdf-material', ['only' => ['pdf','pdf-material']]);
    }

    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    
    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.create', compact('categories','providers'));
    }

    
    public function store(StoreRequest $request)
    {   
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }
        $product = Product::create($request->all()+[
            'image'=>$image_name,
        ]);
        if ($request->code == "") {
            $numero = $product->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $product->update(['code'=>$numeroConCeros]);
        }
        return redirect()->route('products.index');
    }

   
    public function show(Product $product)

    {       
         $kardex = Product::join("movimientos","movimientos.product_id","=","products.id")
                            ->where("movimientos.product_id","=",$product->id)                    
                            ->get();  
        return view('admin.product.show', compact('product','kardex'));
    }

    
    public function edit(Product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();

        return view('admin.product.edit', compact('product','categories','providers'));
    }

    public function update(StoreRequest $request, Product $product)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }
        $product->update($request->all()+[
            'image'=>$image_name,
        ]);
        if ($request->code == "") {
            $numero = $product->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $product->update(['code'=>$numeroConCeros]);
        }
        return redirect()->route('products.index');
    }

   
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
    public function pdf(Product $product)
    {
        $kardex = Product::join("movimientos","movimientos.product_id","=","products.id")
                            ->where("movimientos.product_id","=",$product->id)                    
                            ->get();  

        $pdf = PDF::loadView('admin.product.pdf',compact('kardex','product'));

        return $pdf->stream('Reporte_de_producto.pdf');
    }
    public function pdfmaterial()
    {
        
        $kardex = Product::get();  

        $pdf = PDF::loadView('admin.product.pdf_materiales',compact('kardex'));

        return $pdf->stream('Reporte_de_producto.pdf');

    }
    public function lowmaterial()
    {
        $products = Product::where('stock','<=','15')->get();
    
        return view('admin.product.low_stock', compact('products'));
    }
}

