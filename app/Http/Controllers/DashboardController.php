<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\MOdels\User;
use App\MOdels\Follow;
use \App\Models\Post;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $followedUsers = Follow::where('user_id', $user->id)->pluck('follow_id')->toArray();
        $recommendedUsers = User::whereNotIn('id', $followedUsers)->get()->take(5);
        $posts = Post::all();

        $search =  User::where('name', 'like', '%' . $request->input('search') . '%')
            ->orWhere('email', 'like', '%' . $request->input('search') . '%')
            ->get()->take(5);

        return view('dashboard', [
            'posts' => $posts,
            'recommendedUsers' => $recommendedUsers,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
