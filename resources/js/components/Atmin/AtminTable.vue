<template>
    
    <div>
        <div class="row justify-content-md-between">
            <div class="col-md-auto" v-if="createButton">
                <button class="btn btn-primary mb-3" @click="$emit('create')">
                    Create
                </button>             
            </div>
            
            <div class="col-md-auto">
                
                <form @submit.prevent="page=1; loadTable()" class="justify-content-center">
                    <div class="input-group mb-3">
                        <input v-model="searchQuery" type="text" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>        
                </form>                
                
            </div>
            <div class="col-md-auto">            
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
                        <th v-if="selectButtons" style="width: 20px"></th>
                        <th v-for="column in columns" :style="{width: column.width}">{{column.label}}</th>
                        <th v-if="deleteButtons" style="width: 20px"></th>                                                
                    </tr>
                </thead>
                <tbody v-if="rows.length > 0">
                    <tr v-for="(row, r) in rows" :class="{'table-active': (row===selectedRow)}">
                        <th v-if="selectButtons">
                            <a href="#" class="btn btn-primary btn-sm" @click="onSelectRow(row)">➤</a>
                        </th>
                        <td v-for="column in columns">
                            <atmin-cell-text :value="row[column.name]"></atmin-cell-text>                            
                        </td>
                        <th v-if="deleteButtons">
                            <a href="#" class="btn btn-primary btn-sm" @click="onDeleteRow(row)">&times;</a>
                        </th>                        
                    </tr>            
                </tbody>
                <tbody v-else>
                    <th v-if="selectButtons"></th>
                    <td :colspan="columns.length" class="text-center">
                    - nothing found -
                    </td>
                    <th v-if="deleteButtons"></th>
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
            deleteButtons:  {type: Boolean, default: false},
            createButton:   {type: Boolean, default: false},
        },   
        data(){
            return {    a:!false,
                page: 1,
                lastPage: 1,
                searchQuery: '',
                
                rows: [],                
                selectedRow: null,
            };
        },
        methods: {
            loadTable() {
                this.selectedRow = null;
                
                axios({
                    method: 'get',   
                    params: {page: this.page, search: this.searchQuery},
                    url:    this.resourceUrl                    
                })
                .then(response => {       
                    // Rows in the 'data' node. And pagination.
                    if(response.data.data) {
                        this.rows     = response.data.data;
                        this.lastPage = response.data.last_page;                        
                    }
                    // Rows in root
                    else{
                        this.rows     = response.data;
                        this.lastPage = 1;                        
                    }
                })                
            },
            onSelectRow(row) {
                this.selectedRow = row;
                this.$emit('select', row);
            },
            onDeleteRow(row) {
                this.selectedRow = row;
                this.$emit('delete', row)
            }
        },
        computed: {
        },
        mounted() {
            this.loadTable()
        }
    }
</script>
