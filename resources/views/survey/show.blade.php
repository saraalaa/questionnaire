@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Take Survey</h1>

                {{--<form action="{{url('/surveys/'.$questionnaire->id.'-'.\Illuminate\Support\Str::slug($questionnaire->title))}}"--}}
                <form action="{{ $questionnaire->publicPath() }}"
                      method="post" >
                    @csrf
                    @foreach($questionnaire->questions as $key => $question)
                        <div class="card mt-4">
                            <div class="card-header">
                                <strong class="mr-1">{{$loop->iteration}}</strong>{{ $question->question }}</div>
                            <div class="card-body">

                                @error('responses.'.$key.'.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <ul class="list-group">
                                    @foreach( $question->answers as $answer )
                                        <label for="answer_{{$answer->id}}">
                                            <li class="list-group-item">
                                                {{--<input type="radio" name="responses[{{$question->id}}][answer_id]"--}}
                                                       {{--id="answer-{{$answer->id}}" value="{{$answer->id}}" class="mr-1">--}}
                                                <input type="radio" name="responses[{{$key}}][answer_id]" id="answer_{{$answer->id}}"
                                                       value="{{$answer->id}}" class="mr-1"
                                                        {{old('responses.'.$key.'.answer_id')==$answer->id?'checked':''}}>
                                                {{ $answer->answer }}</li>

                                            <input type="hidden" value="{{$question->id}}"
                                                   name="responses[{{$key}}][question_id]">

                                        </label>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    <div class="card mt-4">
                        <div class="card-header h5">Your Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="survey[name]"
                                       value="{{ old('survey.name') ? old('survey.name'):''}}"
                                       id="name" aria-describedby="nameHelp" placeholder="Enter name">
                                <small id="nameHelp" class="form-text text-muted">please enter name</small>
                                @error('survey.name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="survey[email]"
                                       value="{{ old('survey.email') ? old('survey.email'):'' }}"
                                       id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">please enter email</small>
                                @error('survey.email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark mt-4">Complete Survey</button>
                </form>
            </div>
        </div>
    </div>
@endsection
