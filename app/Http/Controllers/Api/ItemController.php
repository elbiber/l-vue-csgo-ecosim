<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Http\Resources\ItemIndexResource;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ItemIndexResource::collection(
            Item::all()
        );
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
        $validatedData =  $request->validate([
            'name' => 'required|unique:items|max:100',
            'type' => [
                'required',
                Rule::in(['pistol', 'heavy', 'smg', 'rifle', 'grenade', 'equipment']),
            ],
            'price' => 'required|numeric|gte:0',
            'kill_award' => 'required|numeric|gte:0',
            'restricted_to' => [
                'required',
                Rule::in(['none', 'ct', 't']),
            ],
            'image_filename' => 'required'
        ]);
        $item = new Item();
        $item->name = $request->input('name');
        $item->type = $request->input('type');
        $item->price = $request->input('price');
        $item->kill_award = $request->input('kill_award');
        $item->restricted_to = $request->input('restricted_to');
        $item->image_filename = $request->input('image_filename');
        $item->save();
        return $item;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ItemIndexResource(Item::findOrFail($id));
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
