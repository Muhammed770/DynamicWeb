<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {

        if ($request->hasFile("image_contents")) {
            // Loop through multiple uploaded files
            $folder = uniqid() . '-' . now()->format('Y-m-d');
            $storedFiles = [];

            foreach ($request->file('image_contents') as $file) {
                $filename = $file->getClientOriginalName();

                // Store file in the public disk under the unique folder
                $path = Storage::putFileAs('images/tmp/' . $folder, $file, $filename);

                // Return file path for response or further use
                $storedFiles[] = $path;
            }

            return response()->json([
                'message' => 'Files uploaded successfully!',
                'files' => $storedFiles
            ]);
        }

        return response()->json([
            'error' => 'No files were uploaded.'
        ], 400);
    }
}
