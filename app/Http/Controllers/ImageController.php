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

    // Store the uploaded images
    public function store(Request $request)
    {
        // Validate that images are provided
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
        ]);

        if ($request->hasFile('images')) {
            // Loop through each uploaded file
            foreach ($request->file('images') as $file) {
                // Get the original file name
                $originalName = $file->getClientOriginalName();

                // Replace spaces with dashes
                $filename = str_replace(' ', '-', pathinfo($originalName, PATHINFO_FILENAME));

                // Add the file extension
                $filename .= '.' . $file->getClientOriginalExtension();

                // Store the image in the public storage
                $filePath = $file->storeAs('images', $filename, 'public');

                // Create the image URL
                $imageUrl = 'public/storage/' . $filePath; // Use 'storage/' to get the correct URL

                // Save the URL in the database
                $image = new Image(); // Assuming you have an Image model
                $image->url = $imageUrl; // Make sure the 'url' column exists in your images table
                $image->save();
            }
        }

        return redirect()->route('images.index')->with('success', 'Images uploaded successfully!');
    }

    // Display uploaded images
    public function index()
    {
        $images = Image::all(); // Assuming you have an Image model
        return view('images.index', compact('images'));
    }
}
