<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pair;
use App\Http\Requests\StorePairRequest;
use Auth;

class PairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pairs = Pair::whereUserId(Auth::id())->orderBy('created_at', 'ASC')->get();
        return view('pairs.index',compact('pairs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pairs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePairRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        Pair::create($validated);
        return redirect()->route('pairs.index');
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
        $pair = Pair::where('uuid',$id)->first();
        return view('pairs.edit',compact('pair'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePairRequest $request, $id)
    {
        $validated = $request->validated();
        $validated['is_sold'] =  (isset($validated['is_sold'])) == 'on' ? 1 : 0 ;
        $pair = Pair::whereUuid($id)->update($validated);
        return redirect()->route('pairs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pair::where('uuid',$id)->delete();
        return redirect()->route('pairs.index');
    }
}
