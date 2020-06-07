<template>
    <div>
        <div class="form-group row" v-for="field in fields">
            <template v-if="(field.label !== null)">
                <label :for="'field-'+field.name" class="col-form-label" :class="`col-${breakpoint}-${labelCols}`">
                    {{field.label}}
                    <span v-if="field.required" class="text-danger">*</span>                
                </label>  
            </template>    
            
            <div :class="(field.label === null) ? `col-${breakpoint}-12` : `col-${breakpoint}-${fieldCols}`">
                
                <component 
                    v-bind:is="componentName(field)" 
                    :name="field.name" 
                    v-model="values[field.name]" 
                    :values="values"
                    :params="field.params ? field.params : {}"
                ></component>            

                <template v-if="fieldErrors(field.name)">
                    <div class="text-danger" v-for="error in fieldErrors(field.name)">
                        {{error}}
                    </div>              
                </template>    
                
                <small v-if="field.hint" class="form-text text-muted">
                    {{field.hint}}
                </small>
                
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['fields','values','errors'],  
        data(){
            return {
                labelCols: 2,
                breakpoint: 'md',                
            };
        },
        methods: {
            fieldErrors(name) {
                if(this.errors && this.errors[name]) {
                    return this.errors[name];
                }
                else {
                    return [];
                }
            },
            componentName(field) {
                if(field.component) {
                    return 'atmin-field-' + field.component;
                }
                else {
                    return 'atmin-field-text';
                }
            }
        },
        computed: {
            fieldCols() { 
                return 12 - this.labelCols; 
            }
        }
    }
</script>
