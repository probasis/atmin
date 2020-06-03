<template>
    
    <div>
        <atmin-pagination
            @change="page=$event; loadTable()"
            :lastPage="lastPage"
        >        
        </atmin-pagination>

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
    </div>
</template>

<script>
    export default {
        props: {
            resourceUrl: {type: String},
            columns: {type: Array},
        },   
        data(){
            return {    
                page: 1,
                lastPage: 1,
                rows: [                    
                ]
            };
        },
        methods: {
            loadTable() {
                axios({
                    method: 'get',   
                    params: {page: this.page},
                    url:    this.resourceUrl                    
                })
                .then(response => {          
                    this.rows     = response.data.data;
                    this.lastPage = response.data.last_page;
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
