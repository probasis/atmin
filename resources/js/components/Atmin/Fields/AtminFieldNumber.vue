<template>
    <input 
        :id="'field-'+name" 
        :name="name"
        type="number" 
        class="form-control" 
        :style="{'max-width': '150px'}"
        :step="step ? step : 1"
        :value="value"
        :placeholder="placeholder"
        v-on:input="$emit('input', $event.target.value)"
    >
</template>

<script>
    export default {
        props: ['name', 'value', 'step', 'placeholder']
    }
</script>
