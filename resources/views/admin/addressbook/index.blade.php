@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="float-">
            <div class="row">
                <div class="col-xs-offset-1 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Phonebook Directory</div>

                        <div class="panel-body">

                            <table class="table table-hover">
                                <thead>
                                <th>Name</th>
                                <th>Address</th>
                                @if(Auth::check())
                                    <th>Edit</th>
                                    <th>Delete</th>
                                @endif

                                </thead>
                                <tbody>
                                @if(Session::has('flash_message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                @endif
                                @foreach($address_books as $person)
                                    <tr>
                                        <td>
                                            {{$person->name}}
                                        </td>
                                        <td>
                                            {{$person->address}}
                                        </td>

                                        @if(Auth::check())
                                            <td><a href="{{route('addressbook.edit', ['id'=>$person->id])}}" class="btn btn-info">Edit</a></td>
                                            <td><a href="{{route('addressbook.delete', ['id'=>$person->id])}}" class="btn btn-danger">Delete</a></td>
                                        @endif
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            @if (Auth::guest())
                                <h6 style="color: red;"> Note: You Must Be Logged In To Edit This Directory </h6>
                                Click <a href="{{url('/login')}}">here</a> to login or register
                            @else
                                You are logged in!!
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


@stop