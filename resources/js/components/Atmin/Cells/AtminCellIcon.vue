<template>
    <img :src="src" :style="{width:width, height:height}" />
</template>

<script>
    export default {
        props: {
            src: {type:String},
            width: {default:'24px'},
            height: {default:'24px'}
        }
    }
</script>
