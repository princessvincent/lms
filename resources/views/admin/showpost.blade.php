@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Modal -->
        <div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ url('deletepost') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="delete_post" id="post_id">
                            <h5>Are You sure you want to Delete this Post?</h5>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                            <button type="submit" class="btn btn-danger">Yes Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
                            <h4>{{ __('List of Post') }}</h4>
                        </div>
                        @if ($post->count() > 0)
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Created by</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Link</th>
                                        <th scope="col" colspan="2">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($post as $posts)
                                        <tr>
                                            <td>{{ $posts->user->name }}</td>
                                            <td>{{ $posts['title'] }}</td>
                                            <td class="desc">{{ $posts['description'] }}</td>
                                            <td>{{ $posts['link'] }}</td>
                                            <td> <a href="{{ url('editpost/' . $posts->id) }}"
                                                    class="btn btn-success">Edit</a>
                                            </td>
                                            <td>
                                                <button type="button" value="{{ $posts->id }}"
                                                    class="btn btn-danger deletebtn">Delete</button>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        @else
                            <div class="card-body text-center">
                                <h2>You have not created any post</h2>
                                <a href="{{ url('post') }}" class="btn btn-outline-primary float-end">Create a
                                    Post</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.deletebtn').click(function(e) {
                e.preventDefault();

                var posts_id = $(this).val();
                $('#post_id').val(posts_id);
                $('#deletemodal').modal('show')
            });
        });
    </script>
@endsection
