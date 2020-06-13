<template>
    <img v-if="value" :src="path+'/'+value" :style="{'max-width':maxWidth, 'max-height':maxHeight}" />
</template>

<script>
    export default {
        props: {
            value: {default: null},
            maxWidth: {default: '100px'},
            maxHeight: {default: '50px'},
            path: {default: '/storage'}
        }
    }
</script>
