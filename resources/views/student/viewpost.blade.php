@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">

        <!-- Table -->
        <div class="">
            <div class="col-lg-12 col-md-12">
                <div class="card bg-secondary shadow border-0">

                    <div>
                        @if (session()->has('status'))
                            <div class="alert alert-success">
                                {{ session()->get('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="row justify-content-center mt-5" style="margin-left:100px;">
                        <h4 class="text-lg col-md-12 text-primary">{{ $viewpost->title }}</h4>
                      <strong class="text-gray-500 text-sm  col-md-12"><p>Posted: {{ $viewpost->created_at->format('d M Y') }}</p></strong>  
                        @foreach ($user as $users)
                         <strong class="text-gray-500 text-sm  col-md-12"><p>By: {{ $users->name }}</p></strong>  
                        @endforeach
                    </div>

                    <div class="card px-lg-5 py-lg-5 col-lg-12 col-md-12">
                        
                            <div class=" p-2"> <strong>Description:</strong> {{ $viewpost->description }}</div>
                            <div class=" p-2"> <strong>Link/Resources:</strong> {{ $viewpost->link }}</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
