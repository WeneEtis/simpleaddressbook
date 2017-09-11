@extends('layouts.layout')

@section('content')
   <h1> Welcome!!!</h1><br>
    <p>To View The Address Book, Click <a href="{{ url('addressbook') }}">here</a> </p><br>
    <h4> Note: You Must Be Logged In To Edit The Address Book </h4>
@stop