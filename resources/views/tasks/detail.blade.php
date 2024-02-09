@extends('auth.layouts')

@section('content')
    <center>
        <h2>{{ $task->title }}
    </center>
    </h2><br>
    <div class="container-lg">
        <div class="row g-2">
            <div class="col-12">
                <div class="p-32border bg-light" style="font-size: 2rem">{{ $task->desce }}</div>
            </div>
        </div>
        <div class="container-lg">
            <div class="row g-2 justify-content-center">
                <div class="col-4 my-5">
                    <div class="p-32border bg-light" style="font-size: 1.5rem">Created By:{{ $task->user->name }}
                    </div>
                </div>
                <div class="col-4 my-5 ">
                    <div class="p-32border bg-light" style="font-size: 1.5rem">Created
                        On:{{ date_format($task->created_at, 'M/d/Y H:i') }}
                    </div>
                </div>
                <div class="col-4 my-5 ">
                    <div class="p-32border bg-light" style="font-size: 1.5rem">
                        Status
                        <span class="badge bg-primary">{{ $task->status }}</span>
                    </div>
                </div>
            </div>

            <div class="container-fluid d-flex flex-column h-100 pt-3 pb-5">
                <div class="d-flex align-items-center justify-content-between mb-5">
                    <center>
                        <h3 class="fs-4">Comments</h3>
                    </center>
                </div>
                <div class="container px-5 bg-dark">
                    <div class="message-container overflow-auto mt-3 mb-5" style="max-height: 400px;">
                        @foreach ($task->comments as $comment)
                            @if (Auth::user()->id == $comment->user_id)
                                <div class="chat-message d-flex flex-row-reverse mb-3">
                                    {{-- <img src="avatar.png" alt="User avatar" class="img-fluid rounded-circle ms-3" style="width: 40px; height: 40px;"> --}}
                                    <img class="rounded-circle shadow-1-strong mx-3 me-3 "
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp" alt="avatar"
                                        width="40" height="40" />
                                    <div class="message-text bg-primary text-white px-3 py-2 rounded-end">
                                        {{ $comment->comment_text }}</div>
                                    <h6 style="color: rgb(162, 162, 163); margin-right:8px;">
                                        {{ date_format($comment->created_at, 'D H:i') }}</h6>
                                </div>
                            @else
                                <div class="chat-message d-flex mt-3 mb-3">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" alt="avatar"
                                        width="40  " height="40" />
                                    <div class="message-text bg-light px-3 py-2 rounded-start">
                                        {{ $comment->comment_text }}
                                    </div>
                                    <h6 style="color: rgb(162, 162, 163); margin-left:8px;">
                                        {{ date_format($comment->created_at, 'D H:i') }}
                                    </h6>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <form action="/comment/post" method="post">
                        @csrf
                        <div class="d-flex align-items-center">
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <input type="text" name="comment_text" class="form-control me-3" placeholder="Type your Comment...">
                            <button type="submit" class="btn btn-primary">Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 @endsection
