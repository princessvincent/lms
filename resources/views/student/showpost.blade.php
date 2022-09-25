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
                            <h4>{{ __('List of Posts') }}</h4>
                        </div>
                        @if ($post->count() > 0)
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date</th>
                                        <th scope="col" colspan="1">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($post as $posts)
                                        <tr>
                                            
                                            <td>{{ $posts['title'] }}</td>
                                            <td class="desc">{{ $posts['description'] }}</td>
                                            <td>{{ $posts->created_at->format('d M Y') }}</td>
                                            <td> <a href="{{ url('viewpost/' . $posts->id) }}"
                                                    class="btn btn-success">View</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        @else
                            <div class="card-body text-center">
                                <h2>No Post have been Created yet</h2>
                            </div>
                        @endif
                    </div>
                 </div>
            </div>
        </div>
    </div>
@endsection


