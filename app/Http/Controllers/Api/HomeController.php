<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    //
    public function getCategories()
    {

        $categories = Category::where('status', 'Publish')->paginate(5);

        return response()->json(
            [
                'status' => 'Success',
                'categories' => $categories,
            ], 200);
    }
    public function getItems()
    {
        $items = Item::where('status', 'Publish')->paginate(5);

        return response()->json(
            [
                'status' => 'Success',
                'items' => $items,
            ], 200);
    }

    public function productDetail($id)
    {
        $item = Item::where('id', $id)->first();

        return response()->json([
            'status' => 'Success',
            'item' => $item,
        ], 200);
    }

    public function getByCategory($name)
    {
        $items = Item::where('categories.name', $name)
            ->join('categories', 'categories.id', 'items.category_id')
            ->get();

        return response()->json([
            'status' => 'Success',
            'items' => $items,
        ], 200);
    }

    public function filterItems(Request $request){

        $items = Item::where('item_name','LIKE',"%".$request->item_name."%")
        ->whereBetween('price',[$request->minPrice,$request->maxPrice])
        ->where('item_type',$request->item_type)
        ->where('item_condition',$request->item_condition)
        ->where('category_id',$request->category_id)
        ->get();

        return response()->json(
            [
                'status' => 'Success',
                'items' => $items
            ],200);
    }

    public function searchItemByName(Request $request){
        $items = Item::where('item_name' ,'LIKE',"%".$request->item_name."%")->get();

        return response()->json(
            [
                'status' => 'Success',
                'items' => $items
            ],200);
    }
}
