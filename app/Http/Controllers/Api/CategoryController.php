<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $categories = Category::paginate(5);

        return response()->json(
            [
                'categories' => $categories,
                'status' => 'success'
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
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required | unique:categories,name',
        ]);

        $data = $request->all();

        $image_path = request()->file('category_img')->store('image', 'public');

        $data = $request->all();

        $data['category_img'] = $image_path;

        Category::create($data);
        return response()->json(
            [
                'status' => 'success',
                "message" => "Successfully created!"
            ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     *
     */
    public function edit(Category $category)
    {
        //
        return response()->json(
            [
                'status' => 'success',
                'category' => $category,
            ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Category $category)
    {
        //
        $data = $request->all();

        if ($request->hasFile('category_img')) {
            if (Storage::exists($category->category_img)) {
                Storage::delete($category->category_img);
            }

            $image_path = request()->file('category_img')->store('image', 'public');

            $data['category_img'] = $image_path;
        }

        $category->update($data);
        return response()->json(
            [
                'status' => 'success',
                "message" => "Successfully updated!",
            ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return response()->json(
            [
                'status' => 'success',
                "message" => 'Successfully deleted'
            ], 200);
    }
}
