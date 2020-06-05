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
        <label :for="`field-${name}`" class="custom-control-label">{{params ? params.text : ''}}</label> 
    </div> 

</template>

<script>
    export default {            
        props: [
            'name', 
            'params', 
            'value'
        ],
        computed: {
            isChecked() {
                return !!(this.value)
            }
        }
    } 
</script>
