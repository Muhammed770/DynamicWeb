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
            $pages = Page::where('project_id', $project->id)->latest()->get();
        } else {
            abort(403, 'Unauthorized action.');
        }
        return view('pages.index', [
            'pages' => $pages,
            'project' => $project,
            'current_page_id' => null,
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
        return redirect()->back();
    }
    public function show(Project $project, Page $page) {
        $components = $page->components()->latest()->get() ?? collect();
  
        if ($project->user->id == Auth::user()->id) {
            $pages = Page::where('project_id', $project->id)->latest()->get();
            return view('pages.show', [
                'pages' => $pages,
                'page' => $page,
                'project' => $project,
                'components' => $components,
                'current_page_id' => $page->id,
            ]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
