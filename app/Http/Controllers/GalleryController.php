<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function uploadPhoto(Request $request)
    {
        $files = $request->file;

        if (!empty($files)) {
            foreach ($files as $key => $file) {
                $imageName = Str::random(10). '.' .time().'.'.$file->getClientOriginalExtension();

                Storage::disk('s3')->put('images-test/' . $imageName, file_get_contents($file));

                Galery::create([
                    "photo" => $imageName,
                    "created_by" => auth()->user()->id
                ]);
            }
        }

        return response()->json([
            'code' => 200,
            'status' => 'Photo Telah Berhasil Diupload'
        ], 200);
    }
}
