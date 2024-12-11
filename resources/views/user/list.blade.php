@extends('layouts.layouts')
@section('content')
@section('title','user list')

@if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                 <!-- <a href="{{ route('admins.create') }}" class="btn btn-primary btn-rounded mb-3 float-end text-white">Add new user</a> -->
                <h4 class="card-title">User list</h4>




                <div class="table-responsive m-t-40">

                    <table id="config-table"
                        class="table table-responsive"
                        cellspacing="0" width="100%">
                         <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{ $user->role->name }}

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

