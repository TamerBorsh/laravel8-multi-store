<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounts\User\StoreRequest;
use App\Http\Requests\Accounts\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $data = User::paginate(paginate_number);
        return response()->view('back.accounts.user.index', ['users'=> $data]);
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
        $user = new user();
        $user->first_name	    = $request->input('first_name');
        $user->last_name       = $request->input('last_name');
        $user->email           = $request->input('email');
        $user->username        = $request->input('username');
        $user->mobile_number   = $request->input('mobile_number');
        $user->password        = $request->input('password');
        $user->status          = $request->input('status');
        $user->receive_email   = $request->input('receive_email');
        $user->image           = $request->input('image');
        $isSave = $user->save();
        if ($isSave){
            return response()->json(['message'=> $isSave ? 'Save user' : 'error'], $isSave ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
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
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->first_name      = $request->input('first_name');
        $user->last_name       = $request->input('last_name');
        $user->email           = $request->input('email');
        $user->username        = $request->input('username');
        $user->mobile_number   = $request->input('mobile_number');
        $user->password        = $request->input('password');
        $user->status          = $request->input('status');
        $user->receive_email   = $request->input('receive_email');
        $user->image           = $request->input('image');
        $isSave = $user->save();
        if ($isSave){
            return response()->json(['message'=> $isSave ? 'Save user' : 'error'], $isSave ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
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
    public function destroy(User $user)
    {
        $isDelete = $user->delete();
        return response()->json([
            'icon'  =>  $isDelete ? 'success': 'error',
            'title' =>  $isDelete ? 'Delete successfully' : 'Delete failed', 
        ], $isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
