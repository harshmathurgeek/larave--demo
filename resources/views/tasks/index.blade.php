@extends('auth.layouts')
@section('content')
    <center>
        <h3>{{ $title }}</h3>
    </center>
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="col">ID</th>
                <th class="col">Title</th>
                <th class="col">Description</th>
                <th class="col">Status</th>
                <th class="col">Owner</th>
                <th class="col">Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->user->name }}</td>
                    @if ($title == 'Your Tasks')
                        <td>
                            <a href="edit?id={{ $task->id }} "class="btn btn btn-primary btn-xs dt-edit"> Edit</a>

                            <a onclick="showAlert()"
                                href="delete?id={{ $task->id }} "class="btn btn btn-danger btn-xs dt-delete"> delete</a>

                            <input class="mx-2 form-check-input" name="id" onchange="toggleChange(this)"
                                value="{{ $task->id }}" type="checkbox"
                                @if ($task->public) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">public</label>
                        </td>
                    @else
                        <td><a class="btn btn btn-primary btn-xs dt-edit" href="detail/?id={{ $task->id }}">View Task</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($title == 'Your Tasks')
        <center><a href="add" class="btn btn-success">Add Task</a> </center>
    @endif
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable();
        });

        function showAlert() {
            alert("Are You Sure");
        }

        function toggleChange(obj) {
            console.log(obj.value);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/changestatus',
                data: `id=${obj.value}`,
                type: 'POST',
                success: function(result) {

                    console.log("===== " + result + " =====");
                }
            });
        }
    </script>
@endsection
