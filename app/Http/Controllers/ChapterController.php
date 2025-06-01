<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index(Request $request)
    {
        $chapters = Chapter::orderBy('order')->get();

        $isHtmx = $request->hasHeader('HX-Request');

        return view('outline.chapters.index', compact('chapters', 'isHtmx'))
          ->fragmentIf($isHtmx, 'chapter-list');
    }

    public function show(Request $request, Chapter $chapter)
    {
        $isHtmx = $request->hasHeader('HX-Request');

        return view('outline.chapters.show', compact('chapter', 'isHtmx'))
          ->fragmentIf($isHtmx, 'chapter-details');
    }

    public function create(Request $request)
    {
        $isHtmx = $request->hasHeader('HX-Request');

        return view('outline.chapters.create', compact('isHtmx'))
          ->fragmentIf($isHtmx, 'chapter-create-form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $nextOrder = (Chapter::max('order') ?? 0) + 1;
        $data['order'] = $nextOrder;

        $chapter = Chapter::create($data);

        $isHtmx = $request->hasHeader('HX-Request');

        if ($isHtmx) {
            $chapters = Chapter::orderBy('order')->get();

            return view('outline.chapters.index', compact('chapters', 'isHtmx'))
              ->fragments(['chapter-list', 'modal']);
        }

        return redirect()->route('outline.chapters.show', $chapter);
    }

    public function edit(Request $request, Chapter $chapter)
    {
        $isHtmx = $request->hasHeader('HX-Request');

        return view('outline.chapters.edit', compact('chapter', 'isHtmx'))
          ->fragmentIf($isHtmx, 'chapter-edit-form');
    }

    public function update(Request $request, Chapter $chapter)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        $chapter->update($data);

        return redirect()->route('outline.chapters.show', $chapter);
    }

    public function destroy(Request $request, Chapter $chapter)
    {
        // delete the chapter and update orders
        $deletedOrder = $chapter->order;
        $chapter->delete();
        Chapter::where('order', '>', $deletedOrder)->decrement('order');

        $isHtmx = $request->hasHeader('HX-Request');

        if ($isHtmx) {
            $chapters = Chapter::orderBy('order')->get();

            return view('outline.chapters.index', compact('chapters', 'isHtmx'))
              ->fragments(['chapter-list', 'modal']);
        } else {
            return redirect()->route('outline.chapters.index');
        }
    }

}
