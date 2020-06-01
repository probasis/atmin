<template>
    <input 
        :id="'field-'+name" 
        :name="name"
        type="hidden"         
        v-bind:value="value"        
    >
</template>

<script>
    export default {
        props: ['name', 'value']
    }
</script>
