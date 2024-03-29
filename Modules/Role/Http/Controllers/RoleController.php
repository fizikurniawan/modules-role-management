<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Role\Entities\Role;
use Modules\Role\Entities\RolePermission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    
    public function __construct()
    {
        $this->middleware('\Modules\Role\Http\Middleware\RoleMiddleware')->only(['create', 'store', 'edit', 'destroy']);
    }

    public function index()
    {
        $role = Role::all();
        return view('role::index')->with('role', $role);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $role = Role::all();
        return view('role::create')->with('role', $role);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $permissions = $request->input('permission');
        $role_id = $request->input('role_id');
        foreach($permissions as $p){
            $role = RolePermission::firstOrNew([
                'role_id' => $role_id,
                'permission' => $p
            ]);

            $role->save();
        }


        return redirect()->route('role-index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('role::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('role::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
