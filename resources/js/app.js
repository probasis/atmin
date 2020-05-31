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
                name: 'field_a',
                label: 'Text field',
                component: 'text',
                hint: 'Here is some hint'
            },
            {
                name: 'field_b',
                label: 'Textarea field',
                component: 'textarea'                
            },        
            {
                name: 'field_c',
                label: 'Select',
                component: 'select',
                params: {
                    items: choicesExample
                }
            },              
            {
                name: 'field_d',
                label: 'Radio',
                component: 'radio',
                params: {
                    items: choicesExample
                }
            },      
            {
                name: 'field_e',
                label: 'Multiple checkboxes',
                component: 'checkboxes',
                params: {
                    items: choicesExample
                }
            },            
            {
                name: 'field_f',
                label: 'Single checkbox',
                component: 'checkbox',
                params: {
                    text: 'Extra text for the checkbox'
                }
            },                       
        ],
        values: {
            field_a: 'Andrey Tushev',
            field_b: 'The developer',
            field_c: 'fr',
            field_d: 'fr',
            field_e: ['en', 'ru', 'fr'],
            field_f: true,
        }
    },
    mounted() {
        
    }
});


