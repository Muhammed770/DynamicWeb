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
            'text_titles' => 'nullable|array',
            'text_contents' => 'nullable|array',
            'textarea_titles' => 'nullable|array',
            'textarea_contents' => 'nullable|array',
            'image_titles' => 'nullable|array',
            'image_contents' => 'nullable|array',
            'image_captions' => 'nullable|array',
            'date_titles' => 'nullable|array',
            'date_contents' => 'nullable|array',
        ]);

        // Process and store text components
        if (!empty($data['text_contents'])) {
            foreach ($data['text_contents'] as $index => $text) {
                Component::create([
                    'page_id' => $page->id,
                    'type' => 'text',
                    'content' => json_encode([
                        'title' => $data['text_titles'][$index],
                        'text' => $text,
                    ]),
                    'order' => $index,
                ]);
            }
        }

        // Process and store textarea components
        if (!empty($data['textarea_contents'])) {
            foreach ($data['textarea_contents'] as $index => $textarea) {
                Component::create([
                    'page_id' => $page->id,
                    'type' => 'textarea',
                    'content' => json_encode([
                        'title' => $data['textarea_titles'][$index],
                        'text' => $textarea,
                    ]),
                    'order' => $index,
                ]);
            }
        }

        // Process and store image components
        if (!empty($data['image_contents'])) {
            foreach ($data['image_contents'] as $index => $image) {
                $path = $image->store('images');
                Component::create([
                    'page_id' => $page->id,
                    'type' => 'image',
                    'content' => json_encode([
                        'title' => $data['image_titles'][$index],
                        'path' => $path,
                        'caption' => $data['image_captions'][$index],
                    ]),
                    'order' => $index,
                ]);
            }
        }

        // Process and store date components
        if (!empty($data['date_contents'])) {
            foreach ($data['date_contents'] as $index => $date) {
                Component::create([
                    'page_id' => $page->id,
                    'type' => 'date',
                    'content' => json_encode([
                        'title' => $data['date_titles'][$index],
                        'date' => $date,
                    ]),
                    'order' => $index,
                ]);
            }
        }

        return redirect()->back();
    }
}
