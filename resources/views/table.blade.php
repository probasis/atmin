@extends('layout')

@section('content')
<div id="table-app">
    <h1 class="text-center">Table</h1>

    <atmin-table 
        resource-url = "/resources/demo"
        :select-buttons = "false"
        :columns = "columns"
        @select="onRowSelect($event)"
    ></atmin-table>
</div>
@endsection
