<template>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th v-for="column in columns">{{column.label}}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="row in rows">
                <td v-for="column in columns">{{row[column.name]}}</td>
            </tr>            
        </tbody>
    </table>
</template>

<script>
    export default {
        props: {
            resourceUrl: {type: String},
            columns: {type: Array},
        },   
        data(){
            return {                
                rows: [                    
                ]
            };
        },
        methods: {
            loadTable() {
                axios({
                    method: 'get',                    
                    url:    this.resourceUrl                    
                })
                .then(response => {          
                    this.rows = response.data.data;
            
                })                
            }
        },
        computed: {
        },
        mounted() {
            this.loadTable()
        }
    }
</script>
