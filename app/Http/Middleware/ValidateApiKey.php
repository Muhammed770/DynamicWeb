<?php

namespace App\Http\Middleware;

use App\Models\Page;
use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $slug = $request->route('slug');
        if(empty($slug)) {
            return response()->json([
                'success' => false,
                'message' => 'Page slug is required',
            ]);
        }
        $apiKey = $request->header('X-API-KEY');
        if (empty($apiKey)) {
            return response()->json([
                'success' => false,
                'message' => 'API key is required'
            ], 401);
        }
        $project = Project::where('api_key', $apiKey)->first();
        if(! $project) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Invalid API key'
                ]
            );
        }

        $page = Page::where('slug', $slug)->where('project_id', $project->id)->first();
        if(!$page) {
            return response()->json([
                'success'=> false,
                'message'=> 'Page not found',
            ]);
        }

        $request->merge([
            'project' => $project,
            'page'=> $page
        ]);
        return $next($request);
    }
}
