<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $role;
    private $permission;
     public function __construct(Role $role,Permission $permission)
     {
         $this->role= $role;
         $this->permission = $permission;
     }

    public function index()
    {
        //
        $roles = $this->role->paginate(10);
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissionParent = $this->permission->where('parent_id',0)->get();
        return view('admin.role.add',compact('permissionParent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{
            DB::beginTransaction();
            $role = $this->role->create([
                'name' =>$request->name,
                'display_name' =>$request->display_name,
            ]);
    
            $role->permissions()->attach($request->permission_id);
            DB::commit();

            return redirect()->route('roles.index');
        } 
        catch(\Exception $exception){
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
        $permissionParent = $this->permission->where('parent_id',0)->get();
        $role = $this->role->find($id);
        $permissionsChecked = $role->permissions;
        return view('admin.role.edit',compact('permissionParent','role','permissionsChecked'));
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
            $role = $this->role->find($id);
            $role->update([
                'name' =>$request->name,
                'display_name' =>$request->display_name,
            ]);
            
            $role->permissions()->sync($request->permission_id);
            DB::commit();

            return redirect()->route('roles.index');
        } 
        catch(\Exception $exception){
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
        $role = $this->role->find($id);
        $role->permissions()->detach();
        return $this->deleteModelTrait($id,$this->role);
    }
}
