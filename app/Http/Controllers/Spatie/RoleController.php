<?php

namespace App\Http\Controllers\Spatie;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spatie\Role\RoleStoreRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Role::withCount('permissions')->paginate(paginate_number);
        return response()->view('back.spatie.role.index', ['roles'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $role = new Role();
        $role->name	 = $request->input('name');
        $role->guard_name = $request->input('guard_name');
        $isSave = $role->save();
        return response()->json(['message'=> $isSave ? 'Save Role' : 'error'], $isSave ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = Permission::where('guard_name', $role->guard_name)->get();
        $rolePermissions = $role->permissions;

        foreach ($permissions as $permission)
        {   
            $permission->setAttribute('assigned', false);
            // return $permission;
            foreach($rolePermissions as $rolePermission){
                if ($rolePermission->id == $permission->id){
                    $permission->setAttribute('assigned', true);
                }
            }
        }
        return response()->view('back.spatie.role.role-permissions', ['role'=> $role, 'permissions'=> $permissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Role::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name	 = $request->input('name');
        $role->guard_name = $request->input('guard_name');
        $isSave = $role->save();
        return response()->json(['message'=> $isSave ? 'Update Role' : 'error'], $isSave ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $isDelete = $role->delete();
        return response()->json([
            'icon'  =>  $isDelete ? 'success': 'error',
            'title' =>  $isDelete ? 'Delete successfully' : 'Delete failed', 
        ], $isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
