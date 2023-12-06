<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function uploadImage(Request $request) {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = $file->getClientOriginalName();

            $request->file('upload')->move(public_path('/storage/book-upload'), $filename);

            $url = asset('/storage/book-upload/' . $filename);

            return response()->json([
                'fileName' => $filename,
                'uploaded' => 1,
                'url' => $url
            ]);
        }
    }
}
