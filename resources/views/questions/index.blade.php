@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>All Questions</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.create')}}" class="btn btn-sm btn-outline-secondary"><i
                                        class="fa fa-plus-sm"></i>Ask Questions</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        @include('layouts._messages')
                        @forelse($questions as $question)
                           @include('questions._excerpt')
                        @empty
                            <div class="media">
                                <div class="media-body">
                                   <div class="alert alert-warning">

                                    <h3 class="mt-0">Sorry no record is available !</h3>
                                   </div>
                                </div>
                            </div>
                        @endforelse
                            {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
