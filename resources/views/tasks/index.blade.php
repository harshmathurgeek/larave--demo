@extends('auth.layouts')

@section('content')
    _
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            {{-- @if (isset($task)) {{ $task ? route('update') : route('add') }} @endif {{route('add')}} --}}
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body ">
                    <form action="{{ url(!isset($task) ? '/task/add' : '/task/update') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="Title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
                            <div class="col-md-6">
                                <input type="hidden" class="form-control " name="id" value="{{ $task->id ?? '' }}">

                                <input type="text" class="form-control " name="title" value="{{ $task->title ?? '' }}">

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description" class="col-md-4 col-form-label text-md-end text-start">description
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control " name="desce" value="{{ $task->desce ?? '' }}">
                            </div>


                        </div>


                        <div class="mb-3  d-flex justify-content-center">
                            <div class="form-check mx-3 ">
                                <label class="form-check-label " for="flexRadioDefault1">
                                    Pending
                                </label>
                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1"
                                    value="pending"
                                    @if (isset($task)) {{ $task->status == 'pending' ? 'checked' : '' }} @endif>
                            </div>
                            <div class="form-check mx-3">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Completed
                                </label>
                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2"
                                    value="Completed"
                                    @if (isset($task)) {{ $task->status == 'Completed' ? 'checked' : '' }} @endif>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary"
                                value="{{ !isset($task) ? 'add' : 'Update' }} ">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
