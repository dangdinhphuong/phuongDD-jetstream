@extends('layouts.app')

@section('content')
    <a class="btn btn-primary" href="{{ route('adduser') }}">ADD USER</a>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="page">
            {{ $users->links() }}
        </div>
    </div>

    <style>
        .relative svg {
            display: none;
        }

        .items-center>.justify-between {
            display: none;
        }

        .container>.page {
            text-align: center;
            margin-bottom: 5%;
        }

    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (Session::has('message'))
        <script>
            swal({
                title: "Good job!",
                text: "{{ Session::get('message') }}",
                icon: "success",
                button: "OK!",
            });
        </script>
    @endif
@endsection
