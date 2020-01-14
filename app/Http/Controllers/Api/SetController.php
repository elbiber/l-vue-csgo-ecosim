<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Set;
use App\Http\Resources\SetResource;

class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemSets = SetResource::collection(auth()->user()->sets()->get());
        /* $items = Set::find(1)->items;
        return $items; */

        //$itemSet = Set::find(1)->items()->get();// ->where('user_id', 1)->items()->get();

        // $itemSet = Set::where('user_id', 9)->find(1)->items()->get();
        // $itemSet = Set::all();
        // $itemSet = SetResource::collection(Set::get());
        return $itemSets;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // $itemSet = SetResource::collection(auth()->user()->sets()->get());
        // dd();
        // $itemSet = auth()->user()->sets()->find($id)->items()->get();
        // $itemSet = auth()->user()->sets()->get();
        $itemSet = SetResource::collection(auth()->user()->sets()->findOrFail($id)->items()->get());
        return $itemSet;
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
