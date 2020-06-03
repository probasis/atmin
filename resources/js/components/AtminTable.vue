<template>
    
    <div>
        <div class="row">
            <div class="col-md-4">
                
                <form @submit.prevent="loadTable()">
                    <div class="input-group mb-3">

                            <input v-model="searchQuery" type="text" class="form-control">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>

                    </div>        
                </form>                
                
            </div>
            <div class="col-md-8">            
                <atmin-pagination class="justify-content-end"
                    @change="page=$event; loadTable()"
                    :lastPage="lastPage"
                ></atmin-pagination>                                           
            </div>            
        </div>
        
        

        <div class="table-responsive">
            <table class="table table-bordered table-sm table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th v-for="column in columns">{{column.label}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(row, r) in rows" @click="onSelectRow(row, r)" :class="{'table-active': (r===selectedRowNum)}">
                        <td v-for="column in columns">{{row[column.name]}}</td>
                    </tr>            
                </tbody>
            </table>
        </div>
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
                
                rows: [],
                
                selectedRowNum: null,
                searchQuery: '',
            };
        },
        methods: {
            loadTable() {
                this.selectedRowNum = null;
                axios({
                    method: 'get',   
                    params: {page: this.page, search: this.searchQuery},
                    url:    this.resourceUrl                    
                })
                .then(response => {          
                    this.rows     = response.data.data;
                    this.lastPage = response.data.last_page;
                })                
            },
            onSelectRow(row, r) {
                this.selectedRowNum = r;
                this.$emit('select', row);
            }
        },
        computed: {
        },
        mounted() {
            this.loadTable()
        }
    }
</script>
