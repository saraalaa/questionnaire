<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(Questionnaire $questionnaire){
        return view('question.create',compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire){
//        dd(\request());
        $data = request()->validate([
            'question.question'=>'required',
//            '$questionnaire'=>'exists:questionnaires,id',
            'answers.*.answer'=>'required',
        ]);
//        return $data;
        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany( $data['answers'] );

        return redirect('/questionnaires/'.$questionnaire->id);
    }
    public function destroy(Questionnaire $questionnaire , Question $question){

        $question->answers()->delete();
        $question->delete();
        return redirect($questionnaire->path());
    }
}
