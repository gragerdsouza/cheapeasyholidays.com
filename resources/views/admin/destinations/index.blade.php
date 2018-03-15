@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_destination'))
        <p class="bg-danger">{{Session('deleted_destination')}}</p>
    @endif

    <h1>Destinations</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($destinations)

            @foreach($destinations as $destination)
            <tr>
                <td>{{$destination->id}}</td>
                <td><img height="50" src="{{$path}}{{$destination->photo ? $destination->photo->file : 'http://www.hutterites.org/wp-content/uploads/2012/03/placeholder.jpg'}}" alt=""></td>
                <td><a href="{{route('destinations.edit', $destination->id)}}">{{$destination->title}}</a></td>
                <td>{{$destination->created_at->diffForHumans()}}</td>
                <td>{{$destination->updated_at->diffForHumans()}}</td>
            </tr>
            @endforeach

        @endif

        </tbody>
    </table>

@endsection