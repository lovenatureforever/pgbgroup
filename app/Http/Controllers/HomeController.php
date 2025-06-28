<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Project;
use App\Models\Blog;

class HomeController extends Controller
{
    public function welcome(Request $request)
    {
        $slides = Slide::where('is_published', 1)->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('welcome', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function corporate_profile(Request $request)
    {
        $slides = Slide::where('is_published', 1)->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('aboutus.corporate-profile', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function leadership_team(Request $request)
    {
        $slides = Slide::where('is_published', 1)->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('aboutus.leadership-team', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }
}
