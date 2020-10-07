<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(20);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' =>'required|min:10|max:100',
            'link' => 'required|url',
            'course_id' => 'required|integer',
        ];
        $this->validate($request, $rules);

        $video = Video::create($request->all());
        if ($video){
            return redirect('/admin/videos')->withStatus('Video Successfully Created.');
        }else{
            return redirect('/admin/videos/create')->withStatus('Something Wrong!, Try Again.');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $rules = [
            'title' =>'required|min:10|max:100',
            'link' => 'required|url',
            'course_id' => 'required|integer',
        ];
        $this->validate($request, $rules);

        $video->update($request->all());
        if ($video->update($request->all())){
            return redirect('/admin/videos')->withStatus('Video Successfully Updated.');
        }else{
            return redirect('/admin/videos/' .  $video->id . '/edit')->withStatus('Something Wrong!, Try Again.');
        }
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect('/admin/videos')->withStatus('Video Successfully Deleted.');
    }
}
