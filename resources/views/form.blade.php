@extends('layout')

@section('content')
    <h1 class="text-center">Atmin form</h1>

    <atmin-form 
        :fields="fields" 
        :values="values" 
        method="post" 
        action="/form"
    ></atmin-form>
@endsection
