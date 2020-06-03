@extends('layout')

@section('content')
<div id="simple-form-app">
    <h1 class="text-center">Simple form</h1>

    <atmin-form 
        :fields="fields" 
        :values="values" 
        method="post" 
        action="/simple-form"
    ></atmin-form>
</div>    
@endsection
