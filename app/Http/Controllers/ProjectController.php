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
        $attributes = request()->validate([
            'name' => ['required', 'min:2'],
            'description' => ['required', 'min:3'],
            'link' => ['nullable', 'url'],
        ]);
        $attributes['user_id'] = Auth::user()->id;
        $attributes['api_key'] = Str::uuid()->toString();
        Project::create($attributes);
        return redirect('/projects');
    }
}
