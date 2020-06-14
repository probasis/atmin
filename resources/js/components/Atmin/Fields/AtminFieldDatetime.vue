<template>
    <input                 
        :id="'field-'+name" 
        :name="name"
        v-model:value="inputStr"
        @input="onInput"
        
        type="datetime-local" 
        class="form-control" 
        style="max-width: 300px"        
    >
</template>

<script>
    export default {
        props: ['name', 'value'],        
        data(){
            return {
                inputStr: ''
            }
        },
        methods: {
            db2inp(v) {
                const re = /^(\d{4}-\d{2}-\d{2}) (\d{2}:\d{2})/;
                let m = re.exec(v);                                
                return m ? (''+m[1]+'T'+m[2]) : '';                
            },
            inp2db(v) {
                const re = /^(\d{4}-\d{2}-\d{2})T(\d{2}:\d{2})/;
                let m = re.exec(v);                                
                return m ? (''+m[1]+' '+m[2]+':00') : '';                
            },
            onInput(event) {         
                console.log((this.inputStr));
                this.$emit('input', this.inp2db(this.inputStr));
            }
        },
        computed: {        
        },
        watch: {
            value(s) {
                this.inputStr = this.db2inp(s);
            }
        }
    }
</script>
