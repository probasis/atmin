<template>
    <input 
        :id="'field-'+name" 
        :name="name"
        type="text" 
        class="form-control" 
        :style="{'max-width': params.width}"
        :value="value"
        :placeholder="params.placeholder"
        v-on:input="$emit('input', $event.target.value)"
    >
</template>

<script>
    export default {
        props: ['name', 'value', 'params']
    }
</script>
