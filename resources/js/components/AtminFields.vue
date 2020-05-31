<template>
    <div>
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
                    :values="values"
                    :params="field.params"
                ></component>            

                <small v-if="field.hint" class="form-text text-muted">
                    {{field.hint}}
                </small>
                
            </div>
        </div>
        
        <hr>
    </div>
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
        }
    }
</script>
