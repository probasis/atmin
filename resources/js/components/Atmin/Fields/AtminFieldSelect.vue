<template>
    <div>    
        <select 
            name="name"
            class="form-control" 
            v-on:input="$emit('input', $event.target.value)"
        >
            <option v-for="item in items" :value="item.value" :selected="item.value == value">{{ item.text }}</option>
        </select>
    </div>
</template>

<script>
    export default {
            
        props: ['value','items'],            
            
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
