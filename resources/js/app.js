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

const app = new Vue({
    el: '#app',
    data: {
        fields: [
            {
                name: 'text_field',
                label: 'One line text',
                component: 'text',
                hint: 'Here is some hint'
            },
            {
                name: 'value_field',
                label: 'Value field',
                component: 'value',
                hint: 'Read-only value'
            },            
            {                                
                component: 'separator',
                params: {
                    text: 'This is a separator'
                }
            },    
            {                                
                component: 'content',
                params: {
                    text: "This is plain text content\nwith pre-wrap style",
                    html: "Here is a bit of <b>HTML</b> code"
                }
            },            
            {
                name: 'textarea_field',
                label: 'Textarea',
                component: 'textarea',
                required: true,
                params: {
                    rows: 5
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
        ],
        values: {
            value_field: "Some static"+"\n"+"value",
            text_field: 'Andrey Tushev',
            textarea_field: "The"+"\n"+"developer",
            select_field: 'fr',
            radio_field: 'fr',
            checkbox_field: true,
            checkboxes_field: ['en', 'ru', 'fr'],            
        }
    },
    mounted() {
        
    }
});


