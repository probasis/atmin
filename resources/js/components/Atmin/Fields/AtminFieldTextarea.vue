<template>
    <textarea 
        :id="'field-'+name" 
        :name="name"
        class="form-control" 
        :rows="rows ? rows : 5"      
        :value="value" 
        :placeholder="placeholder"
        v-on:input="$emit('input', $event.target.value)"
    >        
    </textarea>
</template>

<script>
    export default {
        props: ['name', 'value', 'rows', 'placeholder']        
    }
</script>
