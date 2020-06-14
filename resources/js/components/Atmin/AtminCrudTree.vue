<template>    
    <div>
        
        <div class="bar py-3 px-1">
            <button class="btn btn-primary" v-if="createButtons.length === 1"
                @click.prevent="onCreateClick(createButtons[0].entityName, createButtons[0].fk)">
                Create
            </button>    

            <div class="btn-group" v-else-if="createButtons.length > 1">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Create
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" v-for="button in createButtons" 
                            @click.prevent="onCreateClick(button.entityName, button.fk)">
                            {{button.entityTitle}}
                        </a>                    
                    </div>
                </div>
            </div>
            
            <button class="btn btn-primary"
                @click="onEditClick()">
                Edit
            </button>
            
            <button class="btn btn-primary"
                @click="onDeleteClick()">
                Delete
            </button>            
            
            {{selectedEntityName}}/{{selectedRowId}}
            
            <!--
            <button class="btn btn-primary">Up</button>
            <button class="btn btn-primary">Down</button>
            -->            
        </div>        
        
        <div class="row">
            <div class="col-6">
                
                <atmin-tree
                    :entities="entities"
                    :children="children"
                    @select-node="onSelect"
                ></atmin-tree>
                
            </div>
            <div class="col-6">
                <div class="form">
                    
                    <atmin-form 
                        ref="ajaxForm"
                        :fields="fields"         
                        :values="{}"    
                        method="post" 
                        action="/ajax-form"
                        :ajax="true"
                    ></atmin-form>
                                       
                </div>
            </div>            
        </div>   
        
        <div class="modal fade" tabindex="-1" role="dialog" ref="deleteDialog">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Delete?</h3>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to delete the selected record?</p>
                        <p class="text-danger">{{deleteError}}</p>
                    </div>        
                    <div class="modal-footer">            
                        <button @click="deleteAction" type="button" class="btn btn-primary">
                            Delete
                        </button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            Cancel
                        </button>                        
                    </div>                      
                </div>
            </div>
        </div>           
        
    </div>
</template>

<style>
    
    .bar {
        background-color: white;
        position: sticky;
        top: 0;
        z-index: 1;
    }    
    
    .tree {
        position: sticky;
        top: 0;
    }
    
    .form {
        position: sticky;
        top: 0;
    }    
    
</style>

<script>
    export default {
        props: {
            entities: {type:Object},
            children: {type:Array}            
        },   
        data(){
            return {
                selectedEntityName: null,
                selectedRowId: null,
                selectedBranchComponent: null,
                
                fields: [],
                
                createButtons: [],
                
                deleteError: null
            };
        },
        methods: {
            onSelect(row, entity, branch) {                
                this.fields = entity.fields;
                
                for(let name in this.entities) {                    
                    if(this.entities[name] === entity) {
                        this.selectedEntityName = name;
                    }                    
                }   
                this.selectedRowId = row.id; 
                this.selectedBranchComponent = branch;
                
                this.$refs.ajaxForm.loadValuesFromUrl(entity.resourceUrl+'/'+row.id);
                
                this.createButtons = [];
                if(entity.children) {
                    for(let child of entity.children) {                    
                        let entity = this.entities[child.entity];
                        let title = entity.title;

                        this.createButtons.push({
                            entityName: child.entity,
                            entityTitle: title ? title : child.entity,
                            fk: child.fk,
                            fkValue: row.id
                        });
                    }                
                }
            },
            onCreateClick(entityName, fk) {
                console.log(entityName, fk, this.selectedRowId);
            },
            onEditClick() {
                console.log(this.selectedEntityName, this.selectedRowId);
            },
            onDeleteClick() {
                this.deleteError = null; 
                $(this.$refs.deleteDialog).modal('show');
            },
            
            deleteAction() {
                this.deleteError = null;    
                
                const entity = this.getSelectedEntity();
                    
                axios({
                    method: 'delete',                       
                    url:    entity.resourceUrl+'/'+this.escapeKey(this.selectedRowId)
                })                
                .then(
                    (response) => { 
                        this.selectedBranchComponent.loadRows()
                        
                        $(this.$refs.deleteDialog).modal('hide');
                    },
                    (response) => {                        
                        this.deleteError = response.response.data.message;
                    }                    
                )
            },
            escapeKey(k) {
                if(typeof k === 'string') {
                    return encodeURIComponent(k)
                }
                else {
                    return ''+k
                }                
            },
            getSelectedEntity() {
                return this.entities[ this.selectedEntityName ];                
            }
        },
        computed: { 
        },
        mounted() {            
        }
    }
</script>
