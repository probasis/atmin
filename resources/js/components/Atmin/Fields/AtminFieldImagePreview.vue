<template>
    <img v-if="value" :src="path+'/'+value" :style="{'max-width':maxWidth, 'max-height':maxHeight}" />
</template>

<script>
    export default {
        props: {
            value: {default: null},
            path: {default: '/storage'},
            maxWidth: {default: '300px'},
            maxHeight: {default: '300px'}            
        }
    }
</script>    