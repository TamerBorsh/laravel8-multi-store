<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounts\Seller\StoreRequest;
use App\Http\Requests\Accounts\Seller\UpdateRequest;
use App\Models\Seller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class SellerController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $seller = Seller::find(1);
        return Seller::with('addresses')-> latest()->first();

        // return $seller->addresses;
        // return response()->json($seller);


        $data = Seller::where('id', '!=', auth('seller')->id())->paginate(paginate_number);
        $roles = Role::where('guard_name', '=', 'seller')->get();

        return response()->view('back.accounts.seller.index', ['sellers'=> $data, 'roles'=> $roles]);
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
        $role = Role::findById($request->input('role_id'), 'seller');
        $seller = new seller();
        $seller->first_name	    = $request->input('first_name');
        $seller->last_name       = $request->input('last_name');
        $seller->email           = $request->input('email');
        $seller->mobile_number   = $request->input('mobile_number');
        $seller->password        = $request->input('password');
        $seller->status          = $request->input('status');
        $seller->image           = $request->input('image');
        $isSave = $seller->save();
        if ($isSave){
            $seller->assignRole($role);
            return response()->json(['message'=> $isSave ? 'Save seller' : 'error'], $isSave ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
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
        return Seller::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Seller $seller)
    {
        $role = Role::findById($request->input('role_id'), 'seller');
        $seller->first_name      = $request->input('first_name');
        $seller->last_name       = $request->input('last_name');
        $seller->email           = $request->input('email');
        $seller->mobile_number   = $request->input('mobile_number');
        $seller->password        = $request->input('password');
        $seller->status          = $request->input('status');
        $seller->image           = $request->input('image');
        $isSave = $seller->save();
        if ($isSave){
            $seller->syncRoles($role);
            return response()->json(['message'=> $isSave ? 'Save seller' : 'error'], $isSave ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
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
    public function destroy(Seller $seller)
    {
        $isDelete = $seller->delete();
        return response()->json([
            'icon'  =>  $isDelete ? 'success': 'error',
            'title' =>  $isDelete ? 'Delete successfully' : 'Delete failed', 
        ], $isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
