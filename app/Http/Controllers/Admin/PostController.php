<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::eloquent(Post::with('user')->latest())
                ->addIndexColumn()
                ->addColumn('action', 'admin.post.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        $users = User::all();
        return view('admin.post.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = Post::updateOrCreate(
            ['idpost' => $request->id],
            [
                'title' => $request->title,
                'content' => $request->content,
                'date' => $request->date,
                'iduser' => $request->iduser,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Post saved successfully'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully'
        ], 200);
    }
}
