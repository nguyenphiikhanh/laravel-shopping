<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Role;
use App\Traits\DeleteModelTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    private $role;

    public function __construct(User $user,Role $role)
    {
        $this->user =$user;
        $this->role =$role;
    }
    public function index()
    {
        //
        $users = $this->user->paginate(10);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = $this->role->all();
        return view('admin.user.add',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        //
        try{
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
            ]);
            $roleIds = $request->role_id;
            $user->roles()->attach($roleIds);
            DB::commit();
            return redirect()->route('users.index');
        } catch(\Exception $exception){
            DB::rollBack();
            Log::error("Lỗi : ".$exception->getMessage()."Dòng : ".$exception->getLine());
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
        //
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $rolesOfUser = $user->roles;
        return view('admin.user.edit',compact('user','roles','rolesOfUser'));
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
        //
        try{
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
            ]);
            $user = $this->user->find($id);
            $roleIds = $request->role_id;
            $user->roles()->sync($roleIds);
            DB::commit();
            return redirect()->route('users.index');
        } catch(\Exception $exception){
            DB::rollBack();
            Log::error("Lỗi : ".$exception->getMessage()."Dòng : ".$exception->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    use DeleteModelTrait;
    public function destroy($id)
    {
        //

            $user = $this->user->find($id);
            $user->roles()->detach();
            return $this->deleteModelTrait($id,$this->user);
    }
}
