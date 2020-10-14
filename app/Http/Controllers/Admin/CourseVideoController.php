<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseVideoController extends Controller
{

    public function create(Course $course)
    {
        return view('admin.courses.createvideo', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $rules = [
            'title' =>'required|min:10|max:100',
            'link' => 'required|url',
            'course_id' => 'required|integer',
        ];
        $this->validate($request, $rules);

        $video = Video::create($request->all());
        if ($video){
            return redirect('/admin/courses' . $course->id )->withStatus('Video Successfully Created.');
        }else{
            return redirect('/admin/courses' . $course->id . '/videos/create')->withStatus('Something Wrong!, Try Again.');
        }
    }
}
