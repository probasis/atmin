<template>    
    <div class="mt-2">
        <div v-if="text" style="white-space: pre-wrap">{{text}}</div>
        <div v-if="html" v-html="html"></div>
    </div>
</template>

<script>
    export default {
        props: ['text', 'html'],
    }
</script>
