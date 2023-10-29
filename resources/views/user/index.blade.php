@extends('layout')
@section('content')

    <div class="container">
        <div class="row mt-5 mb-3">
            <div class="col-md-12">
                <a href="{{route('users.create')}}" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th>{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{ucfirst($user->gender)}}</td>
                            <td>
                                <span class="btn btn-group">
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{route('users.show', $user->id)}}" class="btn btn-success btn-sm">view</a>
                                    <a data-href="{{route('users.destroy', $user->id)}}"
                                       class="btn btn-danger btn-sm delete-user">Delete</a>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $('.delete-user').click(function () {
            if (confirm("Are you sure?")) {
                $.ajax({
                    url: $(this).data('href'),
                    method: 'delete'
                }).then(() => {
                    $(this).parents('tr').remove();
                })
            }
        })
    </script>
@endsection
