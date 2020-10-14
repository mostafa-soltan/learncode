<?php

namespace App\Http\Controllers\Admin;

use App\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizQuestionController extends Controller
{
   public function create(Quiz $quiz)
   {
       return view('admin.quizzes.createquestion', compact('quiz'));
   }
}
