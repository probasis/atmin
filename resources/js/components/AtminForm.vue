<template>
    <form :action="action" method="POST" enctype="multipart/form-data" @submit="submit">
        <input type="hidden" name="_method" :value="method.toUpperCase()">        
        <input type="hidden" name="_token" :value="csrf">
     
        <atmin-fields :fields="fields" :values="myValues" :errors="errors"></atmin-fields>
                        
        <hr>
        
        <div class="form-group row mt-4">            
            <div :class="[`col-${breakpoint}-${fieldCols}`, `offset-${breakpoint}-${labelCols}`]">                                
                              
                <button type="submit" class="btn btn-primary px-5">{{submitText}}</button>                      
                
                <div v-if="error" class="text-danger d-inline-block m-3">
                    {{error}}
                </div>                  
                
            </div>
        </div>                       
    </form>  
</template>

<script>
    export default {
        props: {
            fields: {type: Array},
            values: {type: Object,  default: function(){return {}}},
            valuesUrl: {type: String},
            method: {type: String,  default: 'post'},
            action: {type: String,  default: '?'},
            ajax:   {type: Boolean, default: false},
        },   
        data(){
            return {
                labelCols: 2,
                breakpoint: 'md',
                submitText: 'OK',
                errors: {},
                error: null,
                
                nonReactiveValues: null
            };
        },
        methods: {
            loadValuesFromUrl(url) {
                let promise = axios({
                    method: 'get',                    
                    url:    url
                })                
                .then(response => {                                
                    this.nonReactiveValues = response.data;
                });
                return promise;
            },
            submitValuesToUrl(url, method) {
                let promise = axios({                    
                    url:    url,
                    method: method,                    
                    data:   this.values
                })
                .then(response => {                
                })                
                .catch((error) => {                 
                    this.errors = {};
                    this.error = null;                    
                    
                    const data = error.response.data;            
                    this.errors = data.errors;
                    this.error  = data.message;
                });   
                return promise;
            },            
            submit(event) {
                if(this.ajax) {
                    event.preventDefault();                
                    this.submitValuesToUrl(this.action, this.method);
                }
                else {
                    
                }
            }
        },
        computed: {
            myValues: function() {
                return (this.nonReactiveValues !== null) ? this.nonReactiveValues : this.values;
            },
            fieldCols() { 
                return 12 - this.labelCols; 
            },
            csrf() {
                return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            }
        },
        mounted() {
            if(this.valuesUrl) {
                this.loadValuesFromUrl(this.valuesUrl);
            }
        }
    }
</script>
