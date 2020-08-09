<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire){

        // To Do : i should ensure that questionnaire has at least one question

        $questionnaire->load('questions.answers');
//        dd($questionnaire);
        return view('survey.show',compact('questionnaire'));
    }
    public function store(Questionnaire $questionnaire){
//        dd(\request()->all());
        $data = \request()->validate([
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.answer_id' => 'required:exists:answers,id',
            'survey.name' => 'required',
            'survey.email' => 'required|email',
        ]);

        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);
        return 'Thank You';


    }
}
