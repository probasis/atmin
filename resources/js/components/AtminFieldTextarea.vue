<template>
    <textarea :id="'field-'+name" class="form-control" 
        v-bind:value="value" 
        v-on:input="$emit('input', $event.target.value)"
    >        
    </textarea>
</template>

<script>
    export default {
        props: ['name', 'value'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
