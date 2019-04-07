<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        Role::create(['name' => 'helpdesk']);
//        Permission::create(['name' => 'view']);
//        $role = Role::findById(2);
//        $permission_create = Permission::findById(1);
//        $permission_update = Permission::findById(2);
//        $permission_delete = Permission::findById(3);
//        $permission_view = Permission::findById(4);
//        $role->givePermissionTo($permission_create);
//        $role->givePermissionTo($permission_update);
//        $role->givePermissionTo($permission_delete);
//        $role->givePermissionTo($permission_view);
//        $user = auth()->user();
//        $user->assignRole('admin');
        return view('home');
    }
}
