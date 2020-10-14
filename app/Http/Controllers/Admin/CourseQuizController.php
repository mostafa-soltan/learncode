<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseQuizController extends Controller
{

    public function create(Course $course)
    {
        return view('admin.courses.createquiz', compact('course'));
    }

}
