@extends('layout')

@section('content')
<div id="simple-form-app">
    <h1 class="text-center">Simple form result</h1>

    <pre>@php(print_r($request))</pre>    
</div>    
@endsection
