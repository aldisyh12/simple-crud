<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function all()
    {
        $record = User::get();

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
        $record = User::paginate(15);

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
            'name' => 'required|unique:users'
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'User Telah Dibuat',
            'status' => 200
        ], 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function show($id)
    {
        $record = User::find($id);

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
            'name' => 'required|unique:users'
        ]);

        $record = User::where('id', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'User Telah Diperbarui',
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
        $record = User::find($id);
        $record->delete();

        return response()->json([
            'code' => 200,
            'status' => 'User Telah Berhasil Didelete',
            'data' => $record
        ], 200);
    }
}
