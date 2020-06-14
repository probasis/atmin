<template>
    <div class="mt-1">
        <div v-for="item in items" class="custom-control custom-checkbox custom-control-inline">
            <input 
                type="checkbox" 
                class="custom-control-input" 
                :name="name+'[]'" 
                :id="`field-${name}-${item.value}`" 
                :value="item.value"
                v-model="checks"  
                v-on:change="$emit('input', checks)"       
            >             
            <label :for="`field-${name}-${item.value}`" class="custom-control-label">{{item.text}}</label> 
        </div>
    </div>
</template>

<script>
    export default {            
        props: ['name', 'items', 'value'],
        data() {
            return {
                checks: []
            }
        },
        mounted() {
            this.checks = Array.isArray(this.value) ? this.value.slice() : [];       
        }
    } 
</script>
