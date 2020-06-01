<template>
    <form :action="action" method="POST" enctype="multipart/form-data" @submit="submit">
        <input type="hidden" name="_method" :value="method.toUpperCase()">        
        <input type="hidden" name="_token" :value="csrf">
     
        <atmin-fields :fields="fields" :values="values" :errors="errors"></atmin-fields>
        
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
        props: ['fields','values','method','action'],   
        data(){
            return {
                labelCols: 2,
                breakpoint: 'md',
                submitText: 'OK',
                errors: {},
                error: null
            };
        },
        methods: {
            submit(event) {
                event.preventDefault();
                
                this.errors = {};
                this.error = null;
                
                axios({
                    method: this.method,
                    responseType: 'json',
                    url:    this.action,
                    data:   this.values
                })
                .then(response => {                
                })                
                .catch((error) => {                 
                    const data = error.response.data;            
                    this.errors = data.errors;
                    this.error  = data.message;
                });
            }
        },
        computed: {
            fieldCols() { 
                return 12 - this.labelCols; 
            },
            csrf() {
                return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            }
        }
    }
</script>
