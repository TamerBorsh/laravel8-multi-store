<?php

namespace App\Http\Controllers\Spatie;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spatie\Permission\PermissionStoreRequest;
use App\Http\Requests\Spatie\Permission\PermissionUpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $data = Permission::paginate(paginate_number);
        return response()->view('back.spatie.permission.index', ['permissions'=> $data]);
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
    public function store(PermissionStoreRequest $request)
    {
        $permission = new Permission();
        $permission->name	 = $request->input('name');
        $permission->guard_name = $request->input('guard_name');
        $isSave = $permission->save();
        return response()->json(['message'=> $isSave ? 'Save permission' : 'error'], $isSave ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Permission::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, $id)
    {
        $permission = Permission::find($id);
        $permission->name	    = $request->input('name');
        $permission->guard_name = $request->input('guard_name');
        $isSave = $permission->save();
        return response()->json(['message'=> $isSave ? 'Update permission' : 'error'], $isSave ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $isDelete = $permission->delete();
        return response()->json([
            'icon'  =>  $isDelete ? 'success': 'error',
            'title' =>  $isDelete ? 'Delete successfully' : 'Delete failed', 
        ], $isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
