<template>
    <input 
        :id="'field-'+name" 
        :name="name"
        type="date" 
        class="form-control" 
        style="max-width: 200px"
        v-bind:value="value"
        v-on:input="$emit('input', $event.target.value)"
    >
</template>

<script>
    export default {
        props: ['name', 'value'],        
    }
</script>
