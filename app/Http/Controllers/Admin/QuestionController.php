<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(20);
        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.questions.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title'=> 'required|min:20|max:1000',
            'answers'=> 'required|min:10|max:1000',
            'right_answer'=> 'required|min:3|max:50',
            'score'=> 'required|integer|in:5,10,15,20,25,30',
            'quiz_id'=> 'required|integer',
        ];
        $this->validate($request, $rules);

        $question = Question::create($request->all());
        if ($question) {
            return redirect('/admin/questions')->withStatus('Question Successfully Created.');
        }else{
            return redirect('/admin/questions/create')->withStatus('something Wrong!, Try Again.');
        }
    }

    public function show(Question $question)
    {
        return view('admin.questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $rules = [
            'title'=> 'required|min:20|max:1000',
            'answers'=> 'required|min:10|max:1000',
            'right_answer'=> 'required|min:3|max:50',
            'score'=> 'required|integer|in:5,10,15,20,25,30',
            'quiz_id'=> 'required|integer',
        ];
        $this->validate($request, $rules);

        if ($question->update($request->all())) {
            return redirect('/admin/questions')->withStatus('Question Successfully Updated.');
        }else{
            return redirect('/admin/questions/' . $question->id . '/edit')->withStatus('something Wrong!, Try Again.');
        }
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect('/admin/questions')->withStatus('Question Successfully Deleted.');
    }
}
