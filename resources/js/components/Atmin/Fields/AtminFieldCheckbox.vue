<template>

    <div class="custom-control custom-checkbox mt-1">
        <input 
            :id="`field-${name}`" 
            :name="name"             
            type="checkbox" 
            class="custom-control-input"                         
            :checked="isChecked" 
            v-on:change="$emit('input', $event.target.checked)"       
        >             
        <label :for="`field-${name}`" class="custom-control-label">{{text ? text : ''}}</label> 
    </div> 

</template>

<script>
    export default {            
        props: [
            'name',             
            'value',
            'text' 
        ],
        computed: {
            isChecked() {
                return !!(this.value)
            }
        }
    } 
</script>
