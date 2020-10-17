<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $name = request('name');



        $items = Role::when($name, function ($q, $name){
            return $q->where('name', 'like', "%{$name}%");
        })->sortable(['id' => 'ASC'])
            ->paginate(request('limit', setting('default_list_limit', 10)));



        return view('manager.pages.role.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $permissions = Permission::all();

        return view('manager.pages.role.create', compact('permissions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $data = $request->all();


        $role = Role::create($data);

        $role->syncPermissions($request->input('permissions'));


        return redirect(route('manager.role.index'))->with(toast());
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
     * @param  Role $role
     * @return \Illuminate\View\View
     */
    public function edit(Role $role)
    {

        $permissions = Permission::all();

        return view('manager.pages.role.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $role = Role::findOrFail($id);


        $role->update(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permissions'));

        return redirect(route('manager.role.index'))->with(toast());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response(toast(null,null,null,null,500));
    }
}
