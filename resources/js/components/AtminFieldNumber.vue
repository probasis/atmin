<template>
    <input 
        :id="'field-'+name" 
        :name="name"
        type="number" 
        class="form-control" 
        :style="{'max-width': '150px'}"
        :step="params.step ? params.step : 1"
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
