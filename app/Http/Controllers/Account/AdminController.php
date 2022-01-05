<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounts\Admin\StoreRequest;
use App\Http\Requests\Accounts\Admin\UpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $data = Admin::where('id', '!=', auth('admin')->id())->paginate(paginate_number);
        $roles = Role::where('guard_name', '=', 'admin')->get();

        return response()->view('back.accounts.admin.index', ['admins'=> $data, 'roles'=> $roles]);
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
    public function store(StoreRequest $request)
    {
        $role = Role::findById($request->input('role_id'), 'admin');
        $admin = new Admin();
        $admin->first_name	    = $request->input('first_name');
        $admin->last_name       = $request->input('last_name');
        $admin->email           = $request->input('email');
        $admin->mobile_number   = $request->input('mobile_number');
        $admin->password        = $request->input('password');
        $admin->status          = $request->input('status');
        $admin->image           = $request->input('image');
        $isSave = $admin->save();
        if ($isSave){
            $admin->assignRole($role);
            return response()->json(['message'=> $isSave ? 'Save admin' : 'error'], $isSave ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        }
        else{
            return response()->json(['message'=> 'هناك خلل ما']);
        }

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
        return Admin::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Admin $admin)
    {
        $role = Role::findById($request->input('role_id'), 'admin');
        $admin->first_name      = $request->input('first_name');
        $admin->last_name       = $request->input('last_name');
        $admin->email           = $request->input('email');
        $admin->mobile_number   = $request->input('mobile_number');
        $admin->password        = $request->input('password');
        $admin->status          = $request->input('status');
        $admin->image           = $request->input('image');
        $isSave = $admin->save();
        if ($isSave){
            $admin->syncRoles($role);
            return response()->json(['message'=> $isSave ? 'Save admin' : 'error'], $isSave ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        }
        else{
            return response()->json(['message'=> 'هناك خلل ما']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $isDelete = $admin->delete();
        return response()->json([
            'icon'  =>  $isDelete ? 'success': 'error',
            'title' =>  $isDelete ? 'Delete successfully' : 'Delete failed', 
        ], $isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
