<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FrontPageController extends Controller
{
    public function index()
    {
        return view('frontpage');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('frontPage')->with('success', 'News post created successfully.');
    }
}
