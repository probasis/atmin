<template>
    <div class="row">
        <div v-for="column in params.columns" class="col">
            <atmin-fields :fields="column.fields" :values="values" :errors="errors"></atmin-fields>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['params', 'values', 'errors'],
        data() {
            return {
            }
        },
        methods: {
        }
    }
</script>
