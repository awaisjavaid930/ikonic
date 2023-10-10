<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Resources\RoleResource;
use App\Http\Resources\PermissionResource;

class PermissionController extends Controller
{

    public function index() 
    {
        $roles = Role::get();
        return response()->json(['status' => 200 , 'data' => RoleResource::collection($roles) , 'message' => 'data retrived!']);
    }
    
    public function getRolePermission($roleId) 
    {
        $role = Role::where('id',$roleId)->first();
        $permissions = Permission::get();
        return response()->json(['status' => 200 , 'data' => RoleResource::make($role) , 'permission' => PermissionResource::collection($permissions) ,'message' => 'data retrived!']);
    }
    
    public function assignPermssion(Request $request)
    {
        $role = Role::where('name',$request['role'])->first();
        $role->syncPermissions($request['permissions']);
        return response()->json(['status' => 200 , 'message' => 'data saved!']);
        
        
    }
    
    
    
}
