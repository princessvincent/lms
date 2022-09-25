@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Modal -->
        <div class="modal fade" id="submitmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ url('submittask') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Submit Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <input type="text" name="submittask" id="" class="form-control mb-3">
                            <h5>Are You sure you want to Submit this Task? <br /> This Action is Irriversible</h5>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                            <button type="submit" class="btn btn-danger">Yes Submit</button>
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
                    <div class="row justify-content-center mt-5 card-body" style="margin-left:100px;">
                        <h4 class="text-lg col-md-12 text-dark"> <strong>Task Title:{{ $task->title }}</strong>
                            <small class="text-gray-500 text-sm text-align">
                                <small>
                                    <p>{{ $task->track }}</p>
                                    <p>{{ $task->course }}</p>
                                </small>
                                <p>Posted: {{ $task->created_at->format('d M Y') }}</p>
                            </small>

                        </h4>

                        <div class="border p-2"> <strong>Description:</strong> <br>
                            {{ $task->description }}</div>

                        @if ($subtask->count() > 0)
                            @foreach ($subtask as $subtasks)
                                <strong class="text-gray-500 text-sm  col-md-12 mt-3">
                                    Task Status <p>Grade:
                                        @if ($subtasks->status == '')
                                            Not Graded
                                        @else
                                            {{ $subtasks->status }}/{{ $subtasks->task->points }}
                                        @endif


                                    </p>
                                    <div class="">
                                        <p class="text-primary">Feedback: {{ $subtasks->feedback }}</p>
                                        <p class="text-primary"> Feedback by: {{ $subtasks->feedback_by }}</p>
                                        <p class="text-primary"> Time: {{ $subtasks->time }}</p>
                                    </div>

                                    <div class=" card col-lg-12 col-md-12">
                                        <span class="text-primary mt-5" style="margin-top:20px; margin-bottom:30px;">Your
                                            Submission:</span>
                                        <h3> Mode of Submission: URL</h3>
                                        <h3>Submission: <br />
                                            {{ $subtasks->link }}
                                        </h3>
                                    </div>
                                </strong>
                            @endforeach

                    </div>
                @else
                    <div class="card-body text-left">
                        <h2 class="text-dark">Task Not Submitted</h2><br>
                    </div>

                    @php
                        $nowdate = new DateTime();
                        $due_date = new DateTime($task->deadline);
                    @endphp
                    @if ($nowdate > $due_date)
                    <div class="card-body float-start col-md-12">
                       <h4 class="">Submission Close</h4>
                    </div>
                        
                    @else
                        <div class="card-body px-lg-5 py-lg-5 float-start col-md-12">
                            <form action="">
                                @csrf

                                <button type="button" class="btn btn-primary submit">Submit Task</button>
                            </form>
                        </div>
                    @endif
                    @endif
                </div>
            </div>


        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.submit').click(function(e) {
                e.preventDefault();

                var task_id = $(this).val();
                $('#task_id').val(task_id);
                $('#submitmodal').modal('show')
            });
        });
    </script>
@endsection
