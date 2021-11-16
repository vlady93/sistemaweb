<?php

namespace App\Http\Controllers;

use App\Models\project;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProjectNewsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $projects=Project::where('status','CANCELED')->get();

     
         return view('admin.projectnew.index', compact('projects'));  
    }

}
