<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
//        $this->middleware('permission:user.list', ['only' => ['index']]);
//        $this->middleware('permission:user.create', ['only' => ['create','store']]);
//        $this->middleware('permission:user.edit', ['only' => ['edit','update','enabled']]);
//        $this->middleware('permission:user.destroy', ['only' => ['destroy']]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $items = User::sortable('id')
            ->where('id','<>', 1)
            ->paginate(request('limit',setting('default.list_limit','25')));

        return view('manager.pages.user.index', [
            'items' => $items
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::where('id', '<>', 1)->get();


        return view('manager.pages.user.create', [
            'roles'         => $roles,
        ]);
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->get('password'));

        if ($request->file('avatar')){
            $data['avatar'] = $request->file('avatar')->store('users',['disk' => 'uploads']);
        }

        $user = User::create($data);

        $user->assignRole([$data['role']]);


        return redirect()->route('manager.user.index')->with(toast());

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
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        if($user->id == 1){
            abort('403',__('common.you cannot edit super admin'));
        }
        $roles = Role::where('id', '<>', 1)->get();


        return view('manager.pages.user.edit', [
            'user' => $user,
            'roles'         => $roles,
        ]);
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->except('password');

        $user = User::findOrFail($id);

        if($user->id == 1){
            abort('403',__('common.you cannot edit super admin'));
        }


        if ($request->get('password')){
            $data['password'] = Hash::make($request->get('password'));
        }

        if ($request->file('avatar')){
            $data['avatar'] = $request->file('avatar')->store('users',['disk' => 'uploads']);
//            if ($user->avatar != 'users/default.png'){
//                $this->file_delete($user->avatar);
//            }
        }

        $user->update($data);


        $user->syncRoles([$data['role']]);


        return redirect()->route('manager.user.index')->with(toast());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->id == 1){
            abort('403',__('common.you cannot edit super admin'));
        }

//        if ($user->avatar != 'users/default.png'){
//            $this->file_delete($user->avatar);
//        }

        $user->delete();
        return response(toast(null,null,null,null,500));
    }



}
