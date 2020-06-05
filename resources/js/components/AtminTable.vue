<template>
    
    <div>
        <div class="row">
            <div class="col-md-4">
                
                <form @submit.prevent="page=1; loadTable()">
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
                    :page="page"
                    :lastPage="lastPage"                    
                ></atmin-pagination>                                           
            </div>            
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-sm table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th v-if="selectButtons"></th>
                        <th v-for="column in columns">{{column.label}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(row, r) in rows" :class="{'table-active': (r===selectedRowNum)}">
                        <th v-if="selectButtons">
                            <a href="#" class="btn btn-primary btn-sm" @click="onSelectRow(row, r)">➤</a>
                        </th>
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
            resourceUrl:    {type: String},
            columns:        {type: Array},
            selectButtons:  {type: Boolean, default: false},
        },   
        data(){
            return {    a:!false,
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
