@extends('layout')

@section('content')
<div id="crud-tree-app">
    <h1 class="text-center">Tree</h1>
        
    <atmin-tree
        :children="[{name:'post', fk:null}]"
        
        :entities="{        
            post: {
                resourceUrl: '/resources/posts',
                columns: [
                    {name:'id',     label:'Id',     width:'20px'},
                    {name:'title',  label:'Title'}
                ],
                children: [
                    {name:'comment', fk:'post_id'}
                ]
            },      

            comment: {
                resourceUrl: '/resources/comments',
                columns: [
                    {name:'id',      label:'Id',      width:'20px'},
                    {name:'post_id', label:'Post Id', width:'20px'},
                    {name:'date',    label:'Id'},
                    {name:'author',  label:'author'}
                ],
                children: []                
            }
        }"
    >
            
    </atmin-tree>
</div>
@endsection
