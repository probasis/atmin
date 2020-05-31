<template>
    <input :id="'field-'+name" type="time" class="form-control" style="max-width: 200px"
        v-bind:value="value"
        v-on:input="$emit('input', $event.target.value)"
    >
</template>

<script>
    export default {
        props: ['name', 'value'],        
    }
</script>
