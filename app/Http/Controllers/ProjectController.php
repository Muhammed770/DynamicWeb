<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', Auth::user()->id)->latest()->get();
        return view('dashboard.projects', [
            'projects' => $projects,
        ]);
    }

    public function store()
    {

        $attributes = request()->validate([
            'name' => ['required', 'min:2'],
            'description' => ['required', 'min:3']
        ]);
        $attributes['user_id'] = Auth::user()->id;
        $attributes['api_key'] = bin2hex(random_bytes(16));
        Project::create($attributes);
        return redirect('/dashboard/projects');
    }
}
