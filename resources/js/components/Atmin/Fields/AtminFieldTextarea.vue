<template>
    <textarea 
        :id="'field-'+name" 
        :name="name"
        class="form-control" 
        :rows="params && params.rows ? params.rows : 3"      
        :value="value" 
        :placeholder="params.placeholder"
        v-on:input="$emit('input', $event.target.value)"
    >        
    </textarea>
</template>

<script>
    export default {
        props: ['name', 'value', 'params']        
    }
</script>
