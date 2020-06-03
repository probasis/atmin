/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const choicesExample =  [
    {value:"en", text:"English"},
    {value:"nl", text:"Dutch"},
    {value:"zh", text:"Chinese"},
    {value:"fr", text:"French"},
    {value:"de", text:"German"},
    {value:"it", text:"Italian"},
    {value:"ru", text:"Russian"},
];

const fieldSetA = [
    {name: 'fsa_1',  label: 'Field A1', component: 'text'},
    {name: 'fsa_2',  label: 'Field A2', component: 'text'},
    {name: 'fsa_3',  label: 'Field A3', component: 'text'}
];

const fieldSetB = [
    {name: 'fsb_1',  label: 'Field B1', component: 'text'},
    {name: 'fsb_2',  label: 'Field B2', component: 'text'},    
];

const fieldSetC = [
    {name: 'fsc_1',  label: 'Field C1', component: 'text'},
    {name: 'fsc_2',  label: 'Field C2', component: 'textarea'},
    {name: 'fsc_3',  label: 'Field C3', component: 'checkbox'},
    {name: 'fsc_4',  label: 'Field C4', component: 'date'}
];

const fields = [
    {
        name: 'hidden_field',        
        component: 'hidden',
    },     
    {
        name: 'text_field',
        label: 'One line text',
        component: 'text',        
        hint: 'Here is some hint', 
        params: {
            placeholder: 'Enter short text'
        }
    },         
    {
        name: 'short_text_field',
        label: 'Short text',
        component: 'text',                
        params: {
            width: '150px'
        }
    },    
    {
        name: 'number_field',
        label: 'Number text',
        component: 'number',                
    },     
    {
        name: 'textarea_field',
        label: 'Textarea',
        placeholder: 'Enter short text',
        component: 'textarea',
        required: true,
        params: {
            rows: 5,
            placeholder: 'Type something long here...'
        }
    },        
    {
        name: 'select_field',
        label: 'Select',
        component: 'select',
        required: true,
        params: {
            items: choicesExample
        }
    },              
    {
        name: 'radio_field',
        label: 'Radio',
        component: 'radio',
        params: {
            items: choicesExample
        }
    },      
    {
        name: 'checkboxes_field',
        label: 'Multiple checkboxes',
        component: 'checkboxes',
        params: {
            items: choicesExample
        }
    },            
    {
        name: 'checkbox_field',
        label: 'Single checkbox',
        component: 'checkbox',
        params: {
            text: 'Extra text for the checkbox'
        }
    },    
    {
        name: 'date_field',
        label: 'Date',
        component: 'date',                
    },              
    {
        name: 'time_field',
        label: 'Time',
        component: 'time',                
    },                          
    {
        name: 'file_field',
        label: 'File upload',
        component: 'file',
        params: {                     
        }
    },             
    {              
        label: 'Tabs with fields',
        component: 'tabs',
        params: {
            tabs: [                        
                {title: 'Tab A', fields: fieldSetA},
                {title: 'Tab B', fields: fieldSetB},
                {title: 'Tab C', fields: fieldSetC},                        
            ]
        }
    },                         
    {                                
        component: 'separator',
        params: {
            text: 'This is a separator'
        }
    },    
    {                           
        label: 'Static content',
        component: 'content',
        params: {
            text: "This is plain text content\nwith pre-wrap style",
            html: "Here is a bit of <b>HTML</b> code"
        }
    },     
    {
        name: 'value_field',
        label: 'Value field',
        component: 'value',
        hint: 'Read-only value'
    },               
];

let values = {
    hidden_field: "the_value",
    value_field: "Some static"+"\n"+"value",
    text_field: 'Andrey Tushev',
    textarea_field: "The"+"\n"+"developer",
    select_field: 'fr',
    radio_field: 'fr',
    checkbox_field: true,
    checkboxes_field: ['en', 'ru', 'fr'],            
    file_field: {size: 123456789, download: '/download/fild.pdf'},            
    fsa_1: 'Aaaaa',
    fsa_2: 'Bbbbb',
    fsa_3: 'Ccccc',
    fsb_1: 'Ddddd',
    fsb_2: 'Eeeee',
    fsc_1: 'Fffff',            
};

let columns = [
    {name:'id',     label:'Id'},
    {name:'title',  label:'Title'},
    {name:'text',   label:'Text'},
    {name:'choice', label:'Choice'}                    
];

new Vue({
    el: '#simple-form-app',
    data: {
        fields: fields,
        values: values
    }
});

new Vue({
    el: '#ajax-form-app',
    data: {
        fields: fields,
        values: values,        
    }
});

new Vue({
    el: '#table-app',
    data: {
        columns: columns
    }
});