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
                    {name:'id', width:'24px'},
                    {name:'title'}                    
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
                    {name:'title'}                    
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
                    {name:'title', label:'Title'},                    
                    {name:'photo', label:'Photo', width:'100px', component:'image', params:{path:'/storage/photos'}},                    
                    {name:'price', label:'Price', width:'100px'}                    
                ],
                tableBorder: true,
                children: [
                    {name:'photo', fk:'product_id'},
                    {name:'review', fk:'product_id'}
                ]                
            },
            
            photo: {
                resourceUrl: '/resources/photos',
                tableBorder: true,
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/photo.svg'}},                    
                    {name:'photo', label:'Photo', width:'100px', component:'image', params:{path:'/storage/photos'}},                    
                    {name:'title', label:'Title'}                                     
                ],   
            },
            
            review: {
                resourceUrl: '/resources/reviews',
                tableBorder: true,
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/review.svg'}},                    
                    {name:'time',  label:'Date time', width:'200px'},
                    {name:'author',  label:'Author'},
                    {name:'text', label:'Text'}
                ],                
            },
            
            page: {
                resourceUrl: '/resources/pages',
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/page.svg'}},                    
                    {name:'title'}                 
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
