<template>
    <form>
        <div class="form-group" v-for="field in fields">
            <label :for="'field-'+field.name">{{field.label}}</label>                        
            <component v-bind:is="'atmin-field-' + field.component" :name="field.name" v-model="values[field.name]" :params="field.params"></component>            
            <small v-if="field.hint" class="form-text text-muted">{{field.hint}}</small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>  
</template>

<script>
    export default {
        props: ['fields','values'],  
        data(){
            return {
                
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
