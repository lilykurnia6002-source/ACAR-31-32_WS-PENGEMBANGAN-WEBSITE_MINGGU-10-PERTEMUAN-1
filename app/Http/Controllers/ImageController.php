<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function index()
    {
        return view('image_upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $destinationPath = public_path('uploads');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        // Menggunakan syntax sesuai modul praktikum
        $img = Image::make($file->getRealPath());
        $img->resize(300, 300)->save($destinationPath . '/' . $filename, 75);

        return back()->with('success', 'Image uploaded and resized successfully.');
    }
}