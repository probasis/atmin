<template>    
    <div>       

        <table v-if="rows.length > 0" class="table table-bordered table-sm table-hover mb-0">                
            <tbody>
                <template v-for="row in rows" :class="{'table-active': (row===selectedRow)}">
                    <tr @click.prevent="onSelect(row)" :class="{'bg-warning': isRowSelected(row)}">                        
                        <td v-if="isExpandable">                                 
                            <a href="#" class="btn btn-secondary btn-sm" @click.prevent="collapse(row)" v-if="isRowExpanded(row)">-</a>
                            <a href="#" class="btn btn-secondary btn-sm" @click.prevent="expand(row)" v-else>+</a>                            
                        </td>
                        <td v-for="column in entity.columns">
                            <atmin-cell-text :value="row[column.name]"></atmin-cell-text>                            
                        </td>                                                
                    </tr>            
                    <tr v-if="isRowExpanded(row)">                        
                        <td :colspan="entity.columns.length + 1" class="pl-4">
                            <div v-for="c in entity.children">
                                <atmin-branch
                                    v-on="$listeners"                                    
                                                                        
                                    :selected-entity-name = "selectedEntityName"
                                    :selected-row-id      = "selectedRowId"
                                    
                                    :entities = "entities"
                                    :entityName = "c.name"
                                    :fk = "c.fk"
                                    :fk-value = "row.id"
                                >
                                </atmin-branch>
                            </div>    
                        </td>                        
                    </tr>            
                </template>
            </tbody>
        </table>        
        
    </div>
</template>

<style>
   
</style>

<script>
    export default {
        props: {
            entities: {type:Object},            
            entityName:     {type: String},
            
            fk: {default:null},
            fkValue: {},            
            
            selectedEntityName: {type:String, default:null},
            selectedRowId: {default:null}
        },   
        data(){
            return {
                rows: [],                
                
                expandedRows: []
            };
        },
        methods: {
            loadTable() {
                this.selectedRow = null;
                
                const params = {};
                if(this.fk) {
                    params[this.fk] = this.fkValue;
                }

                axios({
                    method: 'get',   
                    params: params,
                    url:    this.entity.resourceUrl                    
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
            expand(row) {
                this.expandedRows.push(row);                
            },
            collapse(row) {
                let index = this.expandedRows.findIndex((r) => r === row);
                if(index !== -1) {
                    this.expandedRows.splice(index, 1);                
                }                
            },
            isRowExpanded(row) {            
                let index = this.expandedRows.findIndex((r) => r === row);
                return (index !== -1)
            },
            isRowSelected(row) {
                return (row.id == this.selectedRowId) && (this.entityName == this.selectedEntityName);
            },
            onSelect(row) {
                this.$emit('select-node', row, this.entity);
            }
        },
        computed: {
            entity: function(){                                                                 
                return this.entities[this.entityName];
            },
            isExpandable() {
                return this.entity.children.length > 0
            },            
        },
        mounted() {
            this.loadTable()
        }
    }
</script>
