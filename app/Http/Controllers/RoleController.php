<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-rol')->only('index');
         $this->middleware('permission:crear-rol', ['only' => ['create','store']]);
         $this->middleware('permission:editar-rol', ['only' => ['edit','update']]);
         $this->middleware('permission:detalle-rol', ['only' => ['show']]);
         $this->middleware('permission:borrar-rol', ['only' => ['destroy']]);
    }
  
    public function index()
    {
        $roles = Role::get();
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.role.create', compact('permissions'));
    }
    public function store(Request $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.index');
    }
    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('admin.role.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.index');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
