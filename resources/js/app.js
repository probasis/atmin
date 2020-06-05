/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import * as config from './demo-config.js';
 
 
 
new Vue({
    el: '#simple-form-app',
    data: {
        fields: config.fields,      
        values: {},
        valuesUrl: '/ajax-form/values', // Non reactive!!!
    }    
});

new Vue({
    el: '#ajax-form-app',
    data: {
        fields: config.fields,
        values: config.values
    }
});


new Vue({
    el: '#table-app',
    data: {
        columns: config.columns,
        onRowSelect(row){
            console.log('Row select', row.id);
        }
    }
});

new Vue({
    el: '#crud-table-app',
    data: {
        columns: config.columns,
        fields: config.crudFields,
        onRowSelect(row){
            alert('Row select '+row.id);
        }
    }
});