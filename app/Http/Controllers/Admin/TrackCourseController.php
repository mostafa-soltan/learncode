<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\photo;
use App\Track;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackCourseController extends Controller
{
    public function create(Track $track)
    {
        return view('admin.tracks.createcourse', compact('track'));
    }
}
