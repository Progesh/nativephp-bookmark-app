<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Category;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the bookmarks.
     */
    public function index(Request $request)
    {
        $query = Bookmark::with('category');

        // Apply search filter if a search term is provided
        if ($request->has('search') && $request->search != '') {
            $query->where('url', 'like', '%'.$request->search.'%')
                ->orWhere('username', 'like', '%'.$request->search.'%');
        }

        // Apply category filter if a category is selected
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        $bookmarks = $query->get();
        $categories = Category::all();

        return view('bookmarks.index', compact('bookmarks', 'categories'));
    }

    /**
     * Show the form for creating a new bookmark.
     */
    public function create()
    {
        $categories = Category::all();

        return view('bookmarks.create', compact('categories'));
    }

    /**
     * Store a newly created bookmark in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'url' => 'required|url',
            'username' => 'max:100',
            'password' => 'max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Bookmark::create($data);

        return redirect()->route('urls.index')->with('success', 'Bookmark created successfully.');
    }

    /**
     * Show the form for editing the specified bookmark.
     */
    public function edit(int $id)
    {
        $bookmark = Bookmark::findOrFail($id);
        $categories = Category::all();

        return view('bookmarks.create', compact('bookmark', 'categories'));
    }

    /**
     * Update the specified bookmark in storage.
     */
    public function update(Request $request, int $id)
    {
        $bookmark = Bookmark::findOrFail($id);
        if (! $bookmark) {
            return redirect()->route('urls.index')->with('error', 'Bookmark not found.');
        }

        $data = $request->validate([
            'url' => 'required|url',
            'username' => 'max:100',
            'password' => 'max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $bookmark->update($data);

        return redirect()->route('urls.index')->with('success', 'Bookmark updated successfully.');
    }

    /**
     * Remove the specified bookmark from storage.
     */
    public function destroy(int $id)
    {
        $bookmark = Bookmark::findOrFail($id);
        if (! $bookmark) {
            return redirect()->route('urls.index')->with('error', 'Bookmark not found.');
        }

        $bookmark->delete();

        return redirect()->route('urls.index')->with('success', 'Bookmark deleted successfully.');
    }
}
