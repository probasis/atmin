<template>
    <div>    
        <select class="form-control" v-on:input="$emit('input', $event.target.value)">
            <option v-for="item in params.items" :value="item.value" :selected="item.value == value">{{ item.text }}</option>
        </select>
    </div>
</template>

<script>
    export default {
            
        props: ['params', 'value'],            
            
        data: function() {
            return {    
            };
        },
        
        methods: {

        },
            
        mounted() {
        }
    } 
</script>
