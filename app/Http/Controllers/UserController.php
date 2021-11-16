<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;



class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-usuario')->only('index');
         $this->middleware('permission:crear-usuario', ['only' => ['create','store']]);
         $this->middleware('permission:editar-usuario', ['only' => ['edit','update']]);
         $this->middleware('permission:detalle-usuario', ['only' => ['show']]);
         $this->middleware('permission:borrar-usuario', ['only' => ['destroy']]);
    }
    public function index()
    {
        $users = User::get();
        
        return view('admin.user.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $user = User::create($request->all());
       
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index');
    }
    public function show(User $user)
    {
        $total_purchases = 0;
        foreach ($user->sales as $key =>  $sale) {
            $total_purchases+=$sale->total;
        }
        $total_amount_sold = 0;
        foreach ($user->purchases as $key =>  $purchase) {
            $total_amount_sold+=$purchase->total;
        }
        return view('admin.user.show', compact('user', 'total_purchases', 'total_amount_sold'));
    }
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        if ($user->id == 1) {
            return redirect()->route('users.index');
        }else{
            $user->update($request->all());
            $user->roles()->sync($request->get('roles'));
            return redirect()->route('users.index');
        }
    }
    public function destroy(User $user)
    {
        if ($user->id == 1) {
            return back();
        } else {
            $user->delete();
            return back();
        }
    }

    public function agarra (User $user)
    {
        $roles = Role::get();
        dd($roles);
        return view('admin.user.index', compact('roles'));
    }
}
