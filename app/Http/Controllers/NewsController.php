<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $news = new News;
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->image = $fileNameToStore;
        $news->save();

        return redirect()->route('news.index')->with('success', 'تم إنشاء الخبر بنجاح.');
    }

    public function show($id)
    {
        $news = News::find($id);
        return view('admin.news.show', compact('news'));
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        $news = News::find($id);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            $news->image = $fileNameToStore;
        }

        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->save();

        return redirect()->route('news.index')->with('success', 'تم تحديث الخبر بنجاح.');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        if ($news->image != 'noimage.jpg') {
            Storage::delete('public/images/' . $news->image);
        }
        
        $news->delete();
        return redirect()->route('news.index')->with('success', 'تم حذف الخبر بنجاح.');
    }
}
