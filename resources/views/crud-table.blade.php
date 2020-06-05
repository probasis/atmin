@extends('layout')

@section('content')
<div id="crud-table-app">
    <h1 class="text-center">CRUD Table</h1>


    
    <atmin-crud-table 
        resource-url = "/resources/demo"
        :columns = "columns"
        :fields = "fields"        
        @select="onRowSelect($event)"
    ></atmin-crud-table>
</div>
@endsection
