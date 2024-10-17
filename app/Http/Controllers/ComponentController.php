<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use illuminate\support\Str;

class ComponentController extends Controller
{
    public function store(Request $request, $project, Page $page)
    {
   
        $data = $request->validate([
            'text_titles' => 'nullable|array',
            'text_titles.*' => 'nullable|string',

            'text_contents' => 'nullable|array',
            'text_contents.*' => 'nullable|string',

            'textarea_titles' => 'nullable|array',
            'textarea_titles.*' => 'nullable|string',

            'textarea_contents' => 'nullable|array',
            'textarea_contents.*' => 'nullable|string',

            'image_titles' => 'nullable|array',
            'image_titles.*' => ['nullable', 'string'],

            'image_contents' => 'nullable|array',
            'image_contents.*' => ['nullable', 'string'],

            'image_captions' => 'nullable|array',
            'image_captions.*' => 'nullable|string',

            'date_titles' => 'nullable|array',
            'date_titles.*' => 'nullable|string',

            'date_contents' => 'nullable|array',
            'date_contents.*' => 'nullable|date',
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
        if (!empty($data['image_titles'])) {
            foreach ($data['image_titles'] as $index=> $title) {
                // $path = $image->store('images');

                if(!empty($data['image_contents'][$index])){
                    $imageContents = json_decode($data['image_contents'][$index], true);
                    $tempPath = $imageContents['files'][0];
                    if(Storage::disk('local')->exists($tempPath)){
                        $extension = pathinfo($tempPath, PATHINFO_EXTENSION);
                        $newPath = 'images/'. uniqid() . '.' . $extension;
                        Storage::disk('public')->put($newPath, Storage::disk('local')->get($tempPath));
                        Storage::disk('local')->delete($tempPath);
                        $url = Storage::url($newPath);
                    } else {
                        $url = null;
                    }
                    
                }else{
                    $url = null;
                }
                Component::create([
                    'page_id' => $page->id,
                    'type' => 'image',
                    'content' => json_encode([
                        'title' => $title,
                        'path' => $url,
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
