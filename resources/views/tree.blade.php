@extends('layout')

@section('content')
<div id="crud-tree-app">
    <h1 class="text-center">Tree</h1>
        
    <atmin-tree
        :children="[
            {name:'catalog', fk:null},
            {name:'page', fk:'page_id'}
        ]"
        
        :entities="{        
            catalog: {
                resourceUrl: '/resources/catalogs',
                columns: [
                    {component: 'icon', width:'24px', params: {src: '/images/icons/catalog.svg'}},                    
                    {name:'title',  label:'Title'}
                ],
                fields: [
                    {name:'title',  label:'Title'}
                ],
                children: [
                    {name:'category', fk:'catalog_id'}
                ]
            },      

            category: {
                resourceUrl: '/resources/categories',
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/category.svg'}},                    
                    {name:'title',  label:'title'}                    
                ],
                children: [
                    {name:'category', fk:'category_id'},
                    {name:'product', fk:'category_id'},
                ]                
            },

            product: {
                resourceUrl: '/resources/products',
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/product.svg'}},                    
                    {name:'title', label:'title'},                    
                    {name:'price', label:'price',   width:'20px'}
                    
                ],
                children: [
                    {name:'photo', fk:'product_id'},
                    {name:'review', fk:'product_id'}
                ]                
            },
            
            photo: {
                resourceUrl: '/resources/photos',
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/photo.svg'}},                    
                    {name:'title',  label:'title'}                 
                ],   
            },
            
            review: {
                resourceUrl: '/resources/reviews',
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/review.svg'}},                    
                    {name:'author',  label:'author'}                 
                ],                
            },
            
            page: {
                resourceUrl: '/resources/pages',
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/page.svg'}},                    
                    {name:'title',  label:'title'}                 
                ],
                children: [
                    {name:'page', fk:'page_id'}
                ]                
            }            
        }"
    >    
    </atmin-tree>
</div>
@endsection
