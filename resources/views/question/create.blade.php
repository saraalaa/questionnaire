@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Question</div>

                    <div class="card-body">

                        <form method="post" action="{{ url('/questionnaires/'.$questionnaire->id.'/questions') }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Question</label>
                                {{--{{ $old ?? $old('title')  }}--}}
                                <input type="text" class="form-control" name="question[question]"
                                       value="{{ old('question.question') }}"
                                       id="question" aria-describedby="questionHelp" placeholder="Enter question">
                                <small id="questionHelp" class="form-text text-muted">please enter question</small>
                                @error('question.question')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <fieldset>
                                    <legend>choices</legend>
                                    <small id="choicesHelp" class="form-text text-muted">give the choices of your question</small>

                                    <div class="form-group">

                                        <label for="answer1">Choice 1</label>
                                        <input type="text" class="form-control" name="answers[][answer]"
                                               value="{{ old('answers.0.answer') }}"
                                               id="answer1" aria-describedby="choicesHelp" placeholder="Enter choice 1">
                                        @error('answers.0.answer')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <label for="answer1">Choice 2</label>
                                        <input type="text" class="form-control" name="answers[][answer]"
                                               value="{{ old('answers.1.answer') }}"
                                               id="answer2" aria-describedby="choicesHelp" placeholder="Enter choice 2">
                                        @error('answers.1.answer')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <label for="answer1">Choice 3</label>
                                        <input type="text" class="form-control" name="answers[][answer]"
                                               value="{{ old('answers.2.answer') }}"
                                               id="answer3" aria-describedby="choicesHelp" placeholder="Enter choice 3">
                                        @error('answers.2.answer')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <label for="answer1">Choice 4</label>
                                        <input type="text" class="form-control" name="answers[][answer]"
                                               value="{{ old('answers.3.answer') }}"
                                               id="answer4" aria-describedby="choicesHelp" placeholder="Enter choice 4">
                                        @error('answers.3.answer')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </fieldset>
                            </div>
                            <button type="submit" class="btn btn-dark">Create Question</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
