@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Questions</div>

                    <div class="card-body">
                        @forelse($questions as $question)
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mt-0">{{$question->title}}</h3>
                                    {{\Illuminate\Support\Str::limit($question->body,250)}}
                                </div>
                            </div>
                            <hr/>
                        @empty
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mt-0">Sorry no record is available !</h3>
                                </div>
                            </div>
                        @endforelse
                        <div class="mx-auto">
                            {{$questions->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
