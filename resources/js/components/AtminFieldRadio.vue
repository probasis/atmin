<template>
    <div>
        <div v-for="item in params.items" class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" 
                :name="name" 
                :id="`field-${name}-${item.value}`" 
                :value="item.value"
                :checked="item.value === value" 
                v-on:change="$emit('input', $event.target.value)"                
            >             
            <label :for="`field-${name}-${item.value}`" class="custom-control-label">{{item.text}}</label> 
        </div>
    </div>
</template>

<script>
    export default {            
        props: ['name', 'params', 'value'], 
    } 
</script>
