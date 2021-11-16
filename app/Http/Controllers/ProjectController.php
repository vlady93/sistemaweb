<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreRequest;
use App\Models\City;
use App\Models\Client;
use App\Models\File;
use App\Models\project;
use App\Models\ProjectDetails;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Contracts\Role;
use Barryvdh\DomPDF\Facade as PDF;
use PhpParser\Node\Stmt\Else_;

class ProjectController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-proyecto')->only('index');
        $this->middleware('permission:crear-proyecto', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-proyecto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:detalle-proyecto', ['only' => ['show']]);
        $this->middleware('permission:borrar-proyecto', ['only' => ['destroy']]);
        $this->middleware('permission:pdf-proyecto', ['only' => ['pdf', 'pdf_new_proyect']]);
    }
    public function index()
    {
        $projects = Project::where('status', 'VALID')->get();

        return view('admin.project.index', compact('projects'));
    }
    public function create()
    {
        $users1 = User::role('Logistica')->get();
        $users2 = User::role('Administrador')->get();
        $users3 = User::role('Obreros')->get();
        $cities = City::get();
        $clients = Client::get();
        return view('admin.project.create', compact('clients', 'users1', 'users2', 'users3', 'cities'));
    }
    public function store(StoreRequest $request)
    {
        $project = Project::create($request->all() + [
            'user_id' => Auth::user()->id,
            'project_date' => Carbon::now('America/Lima')
        ]);
        $item = $request->id_logistic;
        $item1 = $request->id_admin;
        $results[] = ['user_id' => $item];
        $results[] = ['user_id' => $item1];
        foreach ($request->obrero_id as $key => $obrero) {
            $results[] = array("user_id" => $request->obrero_id[$key]);
        }

        $project->projectDetails()->createMany($results);
        return redirect()->route('projectnews.index');
    }
    public function show(Project $project)
    {
        $resultado = User::join("project_Details", "project_details.user_id", "=", "users.id")
            ->where("project_details.project_id", "=", $project->id)
            ->select("users.name", "users.id")
            ->get();

        if ($project->status == 'CANCELED') {


            return view('admin.projectnew.show', compact('project', 'resultado'));
        } else {

            $sale = Sale::where('project_id', $project->id)->first();
            $files = File::where('project_id', $project->id)->get();
            $projectDetails = $project->projectDetails;

            $subtotal = 0;
            $saleDetails = $sale->saleDetails;
            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity * $saleDetail->price;
            }
            return view('admin.project.show', compact('project', 'projectDetails', 'resultado', 'sale', 'saleDetails', 'subtotal', 'files'));
        }




        return view('admin.project.show', compact('project', 'projectDetails', 'resultado', 'sale', 'saleDetails', 'subtotal', 'files'));
    }
    public function pdf(Sale $sale, Project $project)
    {
        $sale = Sale::where('project_id', $project->id)->first();
        $files = File::where('project_id', $project->id)->get();
        $projectDetails = $project->projectDetails;
        $resultado = ProjectDetails::join("users", "users.id", "=", "project_details.user_id")
            ->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")
            ->join("roles", "roles.id", "=", "model_has_roles.role_id")
            ->select("users.name", "roles.name as cargo")
            ->where("project_details.project_id", "=", $project->id)
            ->get();
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity * $saleDetail->price;
        }

        $pdf = PDF::loadView('admin.project.pdf', compact('project', 'projectDetails', 'resultado', 'sale', 'saleDetails', 'subtotal', 'files'));

        return $pdf->stream('Reporte_de_compra' . $project->id . '.pdf');
    }
    public function pdf_new_project(Project $project)
    {

        $resultado = ProjectDetails::join("users", "users.id", "=", "project_details.user_id")
            ->join("model_has_roles", "model_has_roles.model_id", "=", "users.id")
            ->join("roles", "roles.id", "=", "model_has_roles.role_id")
            ->select("users.name", "roles.name as cargo")
            ->where("project_details.project_id", "=", $project->id)
            ->get();


        $pdf = PDF::loadView('admin.project.pdf_new_project', compact('project', 'resultado'));

        return $pdf->stream('Reporte_de_compra' . $project->id . '.pdf');
    }
}
