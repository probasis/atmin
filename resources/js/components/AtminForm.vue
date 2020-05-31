<template>
    <form>
     
        
        <div class="form-group row" v-for="field in fields">
            <label :for="'field-'+field.name" class="col-form-label" :class="`col-${breakpoint}-${labelCols}`">
                {{field.label}}
                
                <span v-if="field.required" class="text-danger">
                    *
                </span>                
            </label>                        
            
            <div :class="`col-${breakpoint}-${fieldCols}`">
                
                <component 
                    v-bind:is="'atmin-field-' + field.component" 
                    :name="field.name" 
                    v-model="values[field.name]" 
                    :params="field.params"
                ></component>            

                <small v-if="field.hint" class="form-text text-muted">
                    {{field.hint}}
                </small>
                
            </div>
        </div>

        <div class="form-group row mt-4">            
            <div :class="[`col-${breakpoint}-${fieldCols}`, `offset-${breakpoint}-${labelCols}`]">                
                <button type="submit" class="btn btn-primary px-5">{{submitText}}</button>                
            </div>
        </div>        
        
        
    </form>  
</template>

<script>
    export default {
        props: ['fields','values'],  
        data(){
            return {
                labelCols: 2,
                breakpoint: 'md',
                submitText: 'OK'
            };
        },
        computed: {
            fieldCols() { 
                return 12 - this.labelCols; 
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
