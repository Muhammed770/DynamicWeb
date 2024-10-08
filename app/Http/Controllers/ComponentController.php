<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Page;
use App\Models\Project;

class ComponentController extends Controller
{
    public function store(Request $request, $project, Page $page)
    {
        
        $data = $request->validate([
            'text_components' => 'nullable|array',
            'textarea_components' => 'nullable|array',
            'image_components' => 'nullable|array',
            'date_components' => 'nullable|array',
        ]);

        // Process and store text components
        if (!empty($data['text_components'])) {
            foreach ($data['text_components'] as $index => $text) {
                Component::create([
                    'page_id' => $page->id,
                    'type' => 'text',
                    'content' => $text,
                    'order' => $index,
                ]);
            }
        }

        // Process and store textarea components
        if (!empty($data['textarea_components'])) {
            foreach ($data['textarea_components'] as $index => $textarea) {
                Component::create([
                    'page_id' => $page->id,
                    'type' => 'textarea',
                    'content' => $textarea,
                    'order' => $index,
                ]);
            }
        }

        // Process and store image components
        if (!empty($data['image_components'])) {
            foreach ($data['image_components'] as $index => $image) {
                $path = $image->store('images');
                Component::create([
                    'page_id' => $page->id,
                    'type' => 'image',
                    'content' => $path,
                    'order' => $index,
                ]);
            }
        }

        // Process and store date components
        if (!empty($data['date_components'])) {
            foreach ($data['date_components'] as $index => $date) {
                Component::create([
                    'page_id' => $page->id,
                    'type' => 'date',
                    'content' => $date,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->back();
    }
}
