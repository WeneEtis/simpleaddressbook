@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="float-">
            <div class="row">
                <div class="col-xs-offset-1 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Directory: {{$address_books->name}}</div>

                        <div class="panel-body">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif
                            @if(count($errors)>0)
                                <ul class="list-group">
                                    @foreach($errors->all() as $error)
                                        <li class="list-group-item text-danger">
                                            {{$error}}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            <form action="{{route('addressbook.update', ['id'=>$address_books->id])}}" method="post" enctype="multipart/form-data">
                                {{-- csrf_field() --}}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="name" type="text"  class="form-control" value="{{$address_books->name}}">

                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="5" rows="5" class="form-control">{{$address_books->address}}</textarea>

                                </div>
                                <div class="form-group">
                                    <div class="text-center">

                                        <button class="btn btn-success" type="submit">Update</button>
                                    </div>

                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
