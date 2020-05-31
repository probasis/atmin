<template>
    <textarea :id="'field-'+name" class="form-control" 
        :rows="params.rows"      
        :value="value" 
        v-on:input="$emit('input', $event.target.value)"
    >        
    </textarea>
</template>

<script>
    export default {
        props: ['name', 'value', 'params'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
