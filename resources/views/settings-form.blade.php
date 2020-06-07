@extends('layout')

@section('content')
<div id="ajax-form-app">
    <h1 class="text-center">Settings form</h1>

    <atmin-settings-form                 
        resource-url="/resources/settings"
        :ajax="true"         
        :fields = "[                
            {
                name: 'title',
                label: 'Title',
                component: 'text',                
            },{
                name: 'text',
                label: 'Text',
                component: 'textarea',                
            },{
                name: 'choice',
                label: 'Choice',
                component: 'radio',
                params: {
                    items: [
                        {value:'a', text:'Alfa'},
                        {value:'b', text:'Bravo'},
                        {value:'c', text:'Charlie'},
                        {value:'d', text:'Delta'},
                        {value:'e', text:'Echo'},
                        {value:'f', text:'Foxtrot'}
                    ]
                }
            }
        ]"        
    >           
    </atmin-settings-form>
    

    
</div>
@endsection
