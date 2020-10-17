<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Adr;
use Illuminate\Http\Request;

class AdrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function index()
    {
        $name = request('name');
        $parent = request('parent_id');



        $items = Adr::when($name, function ($q, $name){
                return $q->where('name', 'like', "%{$name}%");
            })->sortable(['id' => 'ASC'])
            ->paginate(request('limit', setting('default_list_limit', 10)));



        return view('manager.pages.adr.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('manager.pages.adr.create');

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
            'enabled' => 'required|boolean',
        ]);

        $data = $request->all();


        Adr::create($data);


        return redirect(route('manager.adr.index'))->with(toast());
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
     * @param  Adr $adr
     * @return \Illuminate\View\View
     */
    public function edit(Adr $adr)
    {


        return view('manager.pages.adr.edit',compact('adr'));
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
            'enabled' => 'required|boolean',
        ]);

        $adr = Adr::findOrFail($id);


        $data = $request->all();




        $adr->update($data);

        return redirect(route('manager.adr.index'))->with(toast());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Adr $adr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adr $adr)
    {
        $adr->delete();
        return response(toast(null,null,null,null,500));
    }
}
