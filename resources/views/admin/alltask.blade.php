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

                    <div class="row card-body px-lg-5 py-lg-5 p-0">

                        <div class="text-center text-muted mb-4">
                            <h4>{{ __('List of Tasks') }}</h4>
                        </div>
                        @if ($alltask->count() > 0)
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                    <th scope="col">Author</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Track</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Point</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Description</th>
                                        {{-- <th scope="col" colspan="2">Action</th> --}}
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($alltask as $alltasks)
                                        <tr>
                                            <td>{{ $alltasks->user->name }}</td>
                                            <td>{{ $alltasks['title'] }}</td>
                                            <td>{{ $alltasks['track'] }}</td>
                                            <td>{{ $alltasks['course'] }}</td>
                                            <td>{{ $alltasks['link'] }}</td>
                                            <td>{{ $alltasks['points'] }}</td>
                                            <td>{{ $alltasks['deadline'] }}</td>
                                            <td class="desc">{{ $alltasks['description'] }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        @else
                            <div class="card-body text-center">
                                <h2>No Task have been Created Yet!</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
