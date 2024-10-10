<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image; // Make sure to use your Image model

class ImageController extends Controller
{
    // Show the upload form
    public function create()
    {
        return view('images.upload');
    }

    // Store the uploaded image
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Get the original file name
            $originalName = $file->getClientOriginalName();

            // Replace spaces with dashes
            $filename = str_replace(' ', '-', pathinfo($originalName, PATHINFO_FILENAME));

            // Add the file extension
            $filename .= '.' . $file->getClientOriginalExtension();

            // Store the image in the public storage
            $filePath = $file->storeAs('images', $filename, 'public');

            // Create the image URL
            $imageUrl = 'public/storage/' . $filePath;

            // Save the URL in the database
            $image = new Image(); // Assuming you have an Image model
            $image->url = $imageUrl; // Make sure the 'url' column exists in your images table
            $image->save();
        }
        return redirect()->route('images.index')->with('success', 'Image uploaded successfully!');
    }

    // Display uploaded images
    public function index()
    {
        $images = Image::all(); // Assuming you have an Image model
        return view('images.index', compact('images'));
    }

    //public function index()
    //{
    //$images = Storage::disk('public')->files('images'); // Get all images from the storage

    // Check if the images array is empty
    //$hasImages = count($images) > 0;

    //return view('images.index', compact('images', 'hasImages'));
    //}

}
