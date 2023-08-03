<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pair;
use App\Models\Chick;
use App\Http\Requests\StoreChickRequest;
use Auth;

class ChickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pair = Pair::where('uuid',$id)->first();
        $chicks = Chick::where('pair_id',$id)->orderBy('created_at', 'ASC')->get();
        return view('chicks.index', compact('chicks','id','pair'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('chicks.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChickRequest $request, $id)
    {
        $validated = $request->validated();
        $validated['pair_id'] = $id; 
        Chick::create($validated);
        return redirect()->to('pair/'.$id.'/chicks');

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
    public function edit($pair_id, $id)
    {
        $chick = Chick::where('uuid',$id)->first();
        return view('chicks.edit',compact('chick'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChickRequest $request, $pair_id, $id)
    {
        $validated = $request->validated();
        $chick = Chick::where('uuid',$id)->update($validated);
        return redirect()->to('pair/'.$pair_id.'/chicks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
