@extends('layouts.layouts')

@section('content')
    <div class="container">
        <h1>Contact List</h1>
        <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add Contact</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->country }}</td>
                        <td>
                            <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
