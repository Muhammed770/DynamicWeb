<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PageController extends Controller
{
    public function index(Project $project)
    {

        if ($project->user->id == Auth::user()->id) {
            $pages = Page::where('project_id', $project->id)->get();
        } else {
            abort(403, 'Unauthorized action.');
        }
        return view('dashboard.content-builder', [
            'pages' => $pages,
            'project' => $project,
        ]);
    }

    public function store(Project $project)
    {
        //authorize the user
        request()->validate([
            'name' => ['required','min:2'],
        ]);
        Page::create([
            'project_id' => $project->id,
            'name' => request('name'),
            'slug' => Str::slug($project->name . ' ' . request('name').' '.Str::random(5)),
            'status' => 'draft',
        ]);
        //store the data
        return redirect("/dashboard/{$project->id}/pages");
    }
    public function show(Project $project, Page $page) {
        dd($page);
    }
}
