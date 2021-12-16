@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Countries</h1>

    </div>
    <div class="card">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form class="d-flex" method="GET" action="{{ route('countries.index') }}">
                        <input class="form-control me-2" name="search" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>

                <a href="{{ route('countries.create') }}" class="btn btn-outline-primary float-right">Create</a>
            </div>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Country Code</th>
                        <th scope="col">Country Name</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)
                        <tr>
                            <th scope="row">{{ $country->id }}</th>
                            <td>{{ $country->country_code }}</td>
                            <td>{{ $country->name }}</td>
                            <td>

                                <form action="{{ route('countries.destroy', $country->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-success">Edit</a>
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
