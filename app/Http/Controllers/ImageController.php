<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageRequirement;

class ImageController extends Controller
{
    public function showImages($reference_number)
{
    // Fetch images from the database where reference_number matches
    $images = ImageRequirement::where('reference_number', $reference_number)->get();

    return view('images', [
        'images' => $images ?? collect(), // Ensure it's always a collection
        'reference_number' => $reference_number
    ]);
}


}
