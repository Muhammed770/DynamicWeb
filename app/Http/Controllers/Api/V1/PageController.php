<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(Request $request, $slug)
    {
        $sluggesh = $request->route('slug');
        $page = Page::where("slug", $slug)->first();
        if (empty($page)) {
            return response()->json([
                'success' => false,
                'message'=> 'Page not found',
            ], 404);
        } else {
            $components = $page->components()->latest()->get() ?? collect();
            return response()->json([
                'success'=> true,
                'page' => $page, 
                'components' => $components,
            ], 200);
        }
    }
}
