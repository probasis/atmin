@extends('layout')

@section('content')
<div id="table-app">
    <h1 class="text-center">Table</h1>

    <atmin-table 
        resource-url = "/resources/demo"
        :columns = "columns"
    ></atmin-table>
</div>
@endsection
