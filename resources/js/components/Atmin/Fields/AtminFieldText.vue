<template>
    <input 
        :id="'field-'+name" 
        :name="name"
        type="text" 
        class="form-control" 
        :style="{'max-width': maxWidth}"
        :value="value"
        :placeholder="placeholder"
        v-on:input="$emit('input', $event.target.value)"
    >
</template>

<script>
    export default {
        props: ['name', 'value', 'maxWidth', 'placeholder']
    }
</script>
