<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function create()
    {
        return view('admin.pages.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'place' => 'required',
            'content' => 'required',
            'is_active' => 'required',
        ], [
            'title.required' => 'هذا الحقل مطلوب',
            'place.required' => 'االحقل مطلوب',
            'content.required' => 'الحقل مطلوب',
            'is_active.required' => 'الحقل مطلوب'
        ]);
        $slug = Str::slug($request['title']);
        $page = Page::create([
            'title' => $request['title'],
            'place' => $request['place'],
            'is_active' => $request['is_active'],
            'content' => $request['content'],
            'slug' => $slug
        ]);
        toast('تم', 'success')->position('bottom-start');
        return redirect()->route('admin.page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'place' => 'required',
            'content' => 'required',
            'is_active' => 'required',
        ], [
            'title.required' => 'هذا الحقل مطلوب',
            'place.required' => 'االحقل مطلوب',
            'content.required' => 'الحقل مطلوب',
            'is_active.required' => 'الحقل مطلوب'
        ]);
        $slug = Str::slug($request['title']);
        $page->update([
            'title' => $request['title'],
            'place' => $request['place'],
            'is_active' => $request['is_active'],
            'content' => $request['content'],
            'slug' => $slug
        ]);
        toast('تم', 'success')->position('bottom-start');
        return redirect()->route('admin.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        toast('تم', 'success')->position('bottom-start');
        return redirect()->route('admin.page.index');
    }

}
