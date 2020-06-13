<template>    
    <div class="branch">       

        <table v-if="rows.length > 0" class="table table-borderless table-sm mb-0" :class="{bordered: entity.tableBorder}">                
            <thead v-if="hasHead">
                <tr>
                    <th v-if="isExpandable"></th>
                    <th v-for="column in entity.columns">{{column.label}}</th>
                </tr>                  
            </thead>
            <tbody>
                <template v-for="row in rows" :class="{'table-active': (row===selectedRow)}">  
                    <tr @click.prevent="onSelect(row)" :class="{'branch-row':true, 'bg-warning': isRowSelected(row)}">                        
                        <td v-if="isExpandable" style="width:20px" >                                 
                            <a href="#" class="btn btn-primary btn-sm" @click.prevent="collapse(row)" v-if="isRowExpanded(row)">-</a>
                            <a href="#" class="btn btn-primary btn-sm" @click.prevent="expand(row)" v-else>+</a>                            
                        </td>
                        <td v-for="column in entity.columns" :style="{width: column.width}" class="cell">
                            <component 
                                :is="column.component ? 'atmin-cell-'+column.component : 'atmin-cell-text'" 
                                :value="row[column.name]" 
                                v-bind="typeof column.params == 'object' ? column.params : {}"
                            ></component>                                                        
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
        
        <!--
        <div v-else class="border py-1 px-3 text-muted text-center">
            Empty
        </div>
        -->
        
    </div>
</template>

<style>
    .branch table.bordered > tbody > tr.branch-row > td.cell {        
        border: 1px solid rgb(222, 226, 230);
    }
    .branch table > thead > tr > th {
        //text-align: center;
    }
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
                    params[this.fk] = this.fkValue ? this.fkValue : '';
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
                return this.entity.children && this.entity.children.length > 0
            }, 
            hasHead() {
                return this.entity.columns.some((c) => !!c.label);
            }
        },
        mounted() {
            this.loadTable()
        }
    }
</script>
