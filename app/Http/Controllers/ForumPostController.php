<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;
use App\Models\Etudiants;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use PDF;

class ForumPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forumPosts = ForumPost::all();
        return view('forum.index', ['forumPosts' => $forumPosts]);
    }

    public function getUserPosts()
    {
        if (Auth::check()) {
            $userPosts = Auth::user()->forumposts()->get();
            return view('forum.userposts', ['userPosts' => $userPosts]);
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $forumPosts = ForumPost::all();
        return view('forum.create', ['forumPosts' => $forumPosts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return $request;

        $newPost = ForumPost::create([
                                     'title_EN'       => $request->title_EN,
                                     'body_EN'        => $request->body_EN,
                                     'title_FR'       => $request->title_FR,
                                     'body_FR'        => $request->body_FR,
                                     'user_id'        => Auth::user() -> id
                                    ]);

        return redirect(route('forum.show', $newPost->id))->with('success', 'Forum post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function show(ForumPost $forumPost)
    {
        return view('forum.show', ['forumPost' => $forumPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumPost $forumPost)
    {
        return view('forum.edit', ['forumPost' => $forumPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForumPost $forumPost)
    {
        // return $request
        // return $forumPost
        $forumPost->update([
                           'title_FR'    => $request->title_FR,
                           'body_FR'     => $request->body_FR,
                           'title_EN'    => $request->title_EN,
                           'body_En'     => $request->body_EN
                        ]);

        return redirect(route('forum.show', $forumPost->id))->with('success', 'Forum post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumPost $forumPost)
    {
        // return $forumPost;
        $forumPost->delete();

        return redirect(route('forum.index'))->with('success', 'Forum post deleted successfully.');
    }

    /**
     * Query the specified resource from storage.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */

    public function pages() {
        $forums = ForumPost::Select()
                ->orderby('title')
                ->paginate(3);

        return view('forum.pages', ['forumss' => $forums]);
        // return $forums;
    }
}
