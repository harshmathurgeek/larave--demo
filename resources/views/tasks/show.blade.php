@extends('auth.layouts')
@section('content')
    <center>
        <h3>Tasks</h3>
    </center>

    <table id="myTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="col">ID</th>
                <th class="col">Title</th>
                <th class="col">Description</th>
                <th class="col">status</th>
                <th class="col">Owner</th>
                <th class="col">Action</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->desce }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->user->name }}</td>
                    <td><a class="btn btn btn-primary btn-xs dt-edit" href="/task/detail/?id={{ $task->id }}">View
                            Task</a></td>


                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable();
        });
    </script>
@endsection
