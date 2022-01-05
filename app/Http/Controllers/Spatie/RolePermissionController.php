<?php

namespace App\Http\Controllers\Spatie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RolePermissionController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $permission = Permission::findOrFail($request->input('permission_id'));
        $message = '';
        if ($role->hasPermissionTo($permission))
        {
            $role->revokePermissionTo($permission);
            $message = 'Permission revok success';
        }else{
            $role->givePermissionTo($permission);
            $message = 'Permission assinged success';
        }
        return response()->json(['message'=> $message], Response::HTTP_OK);
        
    }

}
