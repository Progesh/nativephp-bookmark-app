<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index() {
        return Bookmark::all();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'url' => 'required|url',
            'username' => 'required',
            'password' => 'required',
        ]);
        return Bookmark::create($data);
    }

    public function update(Request $request, Bookmark $id) {
        $data = $request->validate([
            'url' => 'required|url',
            'username' => 'required',
            'password' => 'required',
        ]);
        $id->update($data);
        return $id;
    }

    public function destroy(Bookmark $id) {
        $id->delete();
        return response()->json(['status' => 'Deleted']);
    }
}
