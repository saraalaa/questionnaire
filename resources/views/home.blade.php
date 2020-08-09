@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <a href="{{ url('/questionnaires/create') }}" class="btn btn-dark">Create New Questionnaire</a>
                </div>

            </div>

            <div class="card mt-4">
                <div class="card-header">My Questionnaires</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($questionnaires as $questionnaire)
                            <div class="list-group-item">
                                <a href="{{ $questionnaire->path() }}" >{{$questionnaire->title}}</a>
                                <div class="font-weight-bold mt-2">share URL</div>
                                <a href="{{ $questionnaire->publicPath() }}" >{{$questionnaire->publicPath()}}</a>
                            </div>
                        @endforeach
                    </ul>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
