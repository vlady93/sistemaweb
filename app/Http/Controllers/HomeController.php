<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprasmes=DB::select('SELECT month(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by month(c.purchase_date) order by month(c.purchase_date) desc limit 12');
        $ventasmes=DB::select('SELECT month(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALID" group by month(v.sale_date) order by month(v.sale_date) desc limit 12');
       


        // $comprasmes=DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by monthname(c.purchase_date) order by month(c.purchase_date) desc limit 12');
        // $ventasmes=DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALID" group by monthname(v.sale_date) order by month(v.sale_date) desc limit 12');

        $ventasdia=DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, sum(v.total) as totaldia from sales v where v.status="VALID" group by v.sale_date order by day(v.sale_date) desc limit 15');
        $totales=DB::select('SELECT (select ifnull(count(p.id),0) from projects p where DATE(p.project_date)=curdate() and p.status="CANCELED") as proyectosnuevos,(select ifnull(count(p.id),0) from projects p where month(p.project_date)=month(current_date()) group by month(p.project_date)) as proyectosmes');
        $productosvendidos=DB::select('SELECT p.code as code, 
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p 
        inner join sale_details dv on p.id=dv.product_id 
        inner join sales v on dv.sale_id=v.id where v.status="VALID" 
        and year(v.sale_date)=year(curdate()) 
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');
        
        if($stock=DB::select('SELECT name from products where stock <=15 and stock > 5')){
            $danger='warning';
        }elseif($stock=DB::select('SELECT name from products where stock <=5')){
            $danger='danger';
        }else{
            $danger='0';
        }
  
        session()->flash('exito','Existen Materiales que estan por debajo del stock estalecido por la empresa.!!');
        return view('admin.home', compact( 'comprasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos','stock','danger'));
    }

    
}
