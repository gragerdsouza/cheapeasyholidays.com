@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_role'))
        <p class="bg-danger">{{Session('deleted_role')}}</p>
    @endif

    <h1>Roles</h1>

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminRolesController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Role', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>

    <div class="col-sm-6">

        @if($roles)

            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created date</th>
                </tr>
                </thead>

                <tbody>

                @foreach($roles as $role)

                    <tr>
                        <td>{{$role->id}}</td>
                        <td><a href="{{route('roles.edit', $role->id)}}" >{{$role->name}}</a></td>
                        <td>{{$role->created_at ? $role->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        @endif

    </div>

@endsection