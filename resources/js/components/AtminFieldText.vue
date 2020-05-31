<template>
    <input :id="'field-'+name" type="text" class="form-control" 
        v-bind:value="value"
        v-on:input="$emit('input', $event.target.value)"
    >
</template>

<script>
    export default {
        props: ['name', 'value'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
