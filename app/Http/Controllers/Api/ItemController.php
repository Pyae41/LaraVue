<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
        //
        $items = Item::paginate(5);

        return response()->json(
            [
                'items' => $items,
                'status' => 'success',
            ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'category_id' => 'required',
                'item_name' => 'required',
                'price' => 'required | numeric',
                'description' => 'required',
                'item_condition' => 'required',
                'item_type' => 'required',
                'owner_name' => 'required',
                'location' => 'required',
                'contact_number' => 'required',
                'address' => 'required',
            ]
        );

        $image_path = request()->file('item_photo')->store('image', 'public');

        $data = $request->all();

        $data['item_photo'] = $image_path;

        Item::create($data);

        return response()->json(
            [
                'status' => 'success',
                "message" => "Successfully created!",
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Item $item)
    {
        //
        return response()->json(
            [
                'status' => 'success',
                'item' => $item,
            ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Item $item)
    {

        $data = $request->all();

        if ($request->hasFile('item_photo')) {
            if (Storage::exists($item->item_photo)) {
                Storage::delete($item->item_photo);
            }

            $image_path = request()->file('item_photo')->store('image', 'public');

            $data['item_photo'] = $image_path;
        }

        $item->update($data);

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Successfully updated',
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Item $item)
    {
        //
        Storage::delete('/public' . $item->item_photo);
        $item->delete();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'Successfully deleted',
            ], 200);
    }
}
