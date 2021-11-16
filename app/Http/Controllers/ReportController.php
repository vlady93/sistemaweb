<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;


class ReportController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-reporte')->only('index');
         $this->middleware('permission:crear-reporte', ['only' => ['create','store']]);
     
    }
    public function reports_day(){
        $sales=Sale::whereDate('sale_date', Carbon::today())->get();
        $total=$sales->sum('total');
        return view('admin.report.reports_day',compact('sales','total'));
    }

    public function reports_date(){
       
        $sales=Sale::whereDate('sale_date', Carbon::today())->get();
        $total=$sales->sum('total');
        
        return view('admin.report.reports_date',compact('sales','total'));
    }

    public function report_results(Request $request){
        $fi =$request->fecha_ini .' 00:00:00';
        $ff =$request->fecha_fin .' 23:59:59';
        $sales=Sale::join('projects','projects.id','=','sales.project_id')
        ->select('sales.id','sales.sale_date','projects.name','sales.total')
        ->whereBetween('sale_date',[$fi,$ff])->get();
        $total=$sales->sum('total');
        $fini=$fi;
        $ffin=$ff;

        return view('admin.report.reports_date',compact('sales','total','fini','ffin'));
    }

    public function reports_day_purchase(){
        $purchases=Purchase::whereDate('purchase_date', Carbon::today())->get();
        $total=$purchases->sum('total');
        return view('admin.report.reports_day_purchase',compact('purchases','total'));
    }

    public function reports_date_purchase(){
       
        $purchases=Purchase::whereDate('purchase_date', Carbon::today())->get();
        $total=$purchases->sum('total');
        
        return view('admin.report.reports_date_purchase',compact('purchases','total'));
    }

    public function report_results_purchase(Request $request){
        $fip =$request->fecha_ini .' 00:00:00';
        $ffp =$request->fecha_fin .' 23:59:59';
        $purchases=Purchase::whereBetween('purchase_date',[$fip,$ffp])->get();
        $total=$purchases->sum('total');
        $finip=$fip;
        $ffinp=$ffp;

        return view('admin.report.reports_date_purchase',compact('purchases','total','finip','ffinp'));
    }

    public function reports_day_project(){
        $projects=Project::whereDate('project_date', Carbon::today())->get();
        return view('admin.report.reports_day_project',compact('projects'));
    }

    public function reports_date_project(){
       
        $projects=Project::whereDate('project_date', Carbon::today())->get();
        
        return view('admin.report.reports_date_project',compact('projects'));
    }

    public function report_results_project(Request $request){
        $fipr =$request->fecha_ini .' 00:00:00';
        $ffpr =$request->fecha_fin .' 23:59:59';
        $projects=Project::whereBetween('project_date',[$fipr,$ffpr])->get();
        $finipr=$fipr;
        $ffinpr=$ffpr;

        return view('admin.report.reports_date_project',compact('projects','finipr','ffinpr'));
    }
}
