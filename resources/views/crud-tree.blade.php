@extends('layout')

@section('content')
<div id="crud-tree-app">
    <h1 class="text-center">CRUD Tree</h1>
        
    <atmin-crud-tree
        :children="[
            {entity:'catalog', fk:null},
            {entity:'page', fk:'page_id'}
        ]"
        
        :entities="{        
            catalog: {
                title: 'Catalog',
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
                    {entity:'category', fk:'catalog_id'}
                ]
            },      

            category: {
                title: 'Category',
                resourceUrl: '/resources/categories',
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/category.svg'}},                    
                    {name:'title'}                    
                ],
                fields: [
                    {name:'title',  label:'Title'}
                ],                
                children: [
                    {entity:'category', fk:'category_id'},
                    {entity:'product', fk:'category_id'},
                ]                
            },

            product: {
                title: 'Product',
                resourceUrl: '/resources/products',
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/product.svg'}},                    
                    {name:'title', label:'Title'},                    
                    {name:'photo', label:'Photo', width:'100px', component:'image', params:{path:'/storage/photos'}},                    
                    {name:'price', label:'Price', width:'100px'}                    
                ],
                fields: [
                    {name:'title',  label:'Title'},
                    {name:'description',  label:'Description', component:'textarea'},
                    {name:'photo',  label:'Photo'},
                    {name:'photo',  label:'Photo preview', component:'image-preview', params: {path:'/storage/photos'}},
                    {name:'price',  label:'Price', component:'number'}
                ],                
                tableBorder: true,
                children: [
                    {entity:'photo', fk:'product_id'},
                    {entity:'review', fk:'product_id'}
                ]                
            },
            
            photo: {
                title: 'Photo',
                resourceUrl: '/resources/photos',
                tableBorder: true,
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/photo.svg'}},                    
                    {name:'photo', label:'Photo', width:'100px', component:'image', params:{path:'/storage/photos'}},                    
                    {name:'title', label:'Title'}                                     
                ],   
                fields: [
                    {name:'title',  label:'Title'},
                    {name:'photo',  label:'Photo'}                    
                ],                    
            },
            
            review: {
                title: 'Review',
                resourceUrl: '/resources/reviews',
                tableBorder: true,
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/review.svg'}},                    
                    {name:'time',  label:'Date time', width:'200px'},
                    {name:'author',  label:'Author'},
                    {name:'text', label:'Text'}
                ],           
                fields: [
                    {name:'time',  label:'Date time', component:'datetime'},
                    {name:'author',  label:'Author'},
                    {name:'text',  label:'Text', component:'textarea'},
                ],                  
            },
            
            page: {
                title: 'Page',
                resourceUrl: '/resources/pages',
                columns: [                    
                    {component: 'icon', width:'24px', params: {src: '/images/icons/page.svg'}},                    
                    {name:'title'}                 
                ],
                fields: [
                    {name:'id', label:'Id', component:'value'},
                    {name:'title', label:'Title', component:'text'},
                    {name:'text', label:'Text', component:'textarea'}
                ],
                children: [
                    {entity:'page', fk:'page_id'}
                ]                
            }            
        }"
    >    
    </atmin-crud-tree>
</div>
@endsection
