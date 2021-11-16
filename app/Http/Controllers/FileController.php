<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-imagen')->only('index');
         $this->middleware('permission:crear-imagen', ['only' => ['create','store']]);
     
    }
    public function index()
    {
        $files = File::get();
        return view('admin.file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $id_project=$request->project_id;
        $imagenes = $request->file('file')->store('public/imagenes');
        $url = Storage::url($imagenes);
        File::create([
            'url'=> $url,
            'project_id'=>$id_project,
        ]);
        
    }

}
