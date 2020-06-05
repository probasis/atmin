<template>
    <div>{{visible}}</div>
</template>

<script>
    export default {
        props: {
            value: {default: null},
            maxLength: {type: Number, default: 200}
        },
        computed: {
            visible() {
                if(typeof this.value == 'string') {
                    if(this.value.length > this.maxLength)  {
                        return this.value.slice(0, this.maxLength) + '...';
                    }
                    else {
                        return this.value;
                    }
                }
                else {
                    return this.value;
                }
            }
        }
    }
</script>
