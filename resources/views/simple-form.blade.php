@extends('layout')

@section('content')
<div id="simple-form-app">
    <h1 class="text-center">Simple form</h1>

    <atmin-form 
        ref="simpleForm"
        :fields="fields" 
        values-url="/ajax-form/values"
        method="post" 
        action="/simple-form"
    ></atmin-form>
</div>    
@endsection
