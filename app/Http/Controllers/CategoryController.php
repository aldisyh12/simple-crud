<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function all()
    {
        $record = Category::with('createdBy')->get();

        return response()->json([
            'code' => 200,
            'status' => "Success",
            'data' => $record
        ], 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function paginate()
    {
        $record = Category::with('createdBy')->paginate(15);

        return response()->json([
            'code' => 200,
            'status' => "Success",
            'data' => $record
        ], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        Category::create([
            "name" => $request->name,
            "created_by" => auth()->user()->id
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'Category Telah Dibuat',
        ], 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function show($id)
    {
        $record = Category::with('createdBy')->find($id);

        return response()->json([
            'code' => 200,
            'status' => "Success",
            'data' => $record
        ], 200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $record = Category::where('id', $id)->update([
            "name" => $request->name,
            "updated_by" => auth()->user()->id
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'Category Telah Diperbarui',
            'data' => $record
        ], 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function delete($id)
    {
        $record = Category::find($id);
        $record->delete();

        return response()->json([
            'code' => 200,
            'status' => 'Category Telah Berhasil Didelete',
            'data' => $record
        ], 200);
    }
}
