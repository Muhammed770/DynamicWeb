<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', Auth::user()->id)->latest()->get();
        return view('projects.index', [
            'projects' => $projects,
        ]);
    }

    public function store()
    {
        $link = request()->input('link');

        // Ensure the link starts with http:// or https://
        if (!preg_match("~^(http|https)://~i", $link)) {
            $link = 'https://' . $link;
        }
    
        $attributes = request()->validate([
            'name' => ['required', 'min:2'],
            'description' => ['required', 'min:3'],
            'link' => ['required']
        ]);

        if(!filter_var($link, FILTER_VALIDATE_URL)) {
            return redirect()->back()->with('error', 'The link must be a valid URL.');
        }
        $attributes['link'] = $link;
        $attributes['user_id'] = Auth::user()->id;
        $attributes['api_key'] = Str::uuid()->toString();
        Project::create($attributes);
        return redirect('/projects');
    }
}
