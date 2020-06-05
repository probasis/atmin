<template>    
    <div class="mt-2">
        <div v-if="params.text" style="white-space: pre-wrap">{{params.text}}</div>
        <div v-if="params.html" v-html="params.html"></div>
    </div>
</template>

<script>
    export default {
        props: ['params'],
    }
</script>
