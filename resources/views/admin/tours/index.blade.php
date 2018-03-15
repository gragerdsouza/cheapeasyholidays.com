@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_tour'))
        <p class="bg-danger">{{Session('deleted_tour')}}</p>
    @endif

    <h1>Tours</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Price</th>
            <th>Offer</th>
            <th>Package</th>
            <th>Destination</th>
            <th>body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($tours)

            @foreach($tours as $tour)
            <tr>
                <td>{{$tour->id}}</td>
                <td><a href="{{route('tours.edit', $tour->id)}}">{{$tour->title}}</a></td>
                <td>£{{$tour->price}}</td>
                <td>{{$tour->offer}}%</td>
                <td>{{$tour->package}}</td>
				<td>{{$tour->destination ? $tour->destination->title : 'Uncategorized'}}</td>
                <td>{{str_limit($tour->body, 20)}}</td>
                <td>{{$tour->created_at->diffForHumans()}}</td>
                <td>{{$tour->updated_at->diffForHumans()}}</td>
            </tr>
            @endforeach

        @endif

        </tbody>
    </table>

@endsection