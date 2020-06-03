@extends('layout')

@section('content')
<div id="ajax-form-app">
    <h1 class="text-center">Ajax form</h1>

    <atmin-form 
        :fields="fields" 
        :values="values" 
        method="post" 
        action="/ajax-form"
        ajax="true"
    ></atmin-form>
</div>
@endsection
