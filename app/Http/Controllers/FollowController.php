<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $followers = Follow::where('user_id', auth()->user()->id)->get();

      return view('followers.index', ['followers' => $followers]);
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
    public function store(User $user)
    {
        $exists = Follow::where('user_id', auth()->user()->id)
            ->where('follow_id', $user->id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'You are already following this user.');
        }

        Follow::create([
            'user_id' => auth()->user()->id,
            'follow_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'You are now following this user.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Follow $follow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Follow $follow)
    {
        $follow->delete();

        return redirect()->route('followers.index');
    }
}
