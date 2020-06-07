<template>
    
    <div>

        <div class="modal fade" tabindex="-1" role="dialog" ref="formDialog">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">{{formTitle}}</h3>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <atmin-form 
                            ref="atminForm"
                            @success-submit="onSuccessSubmit()"
                            :fields="fields" 
                            :values="values" 
                            :action="formAction"
                            :method="formMethod"                             
                            v-bind:ajax="true"
                        ></atmin-form>
                    </div>                                             
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
                        <p>Do you realy want to delete the record?</p>
                        <p class="text-danger">{{deleteError}}</p>
                    </div>        
                    <div class="modal-footer">            
                        <button @click="deleteRecord" type="button" class="btn btn-primary">
                            Delete
                        </button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            Cancel
                        </button>                        
                    </div>                      
                </div>
            </div>
        </div>         
        
        <atmin-table    
            ref="atminTable"
            :create-button="true"
            :select-buttons="true"
            :delete-buttons="true"
            :resource-url = "resourceUrl"
            :columns = "columns"
            @create="launchCreateForm()"
            @select="launchEditForm($event)"
            @delete="deleteDialog($event)"
            :createButton="canCreate"
            :deleteButtons="canDelete"            
        ></atmin-table>
        
    </div>
        
</template>

<script>
    export default {
        props: {
            resourceUrl: {type: String},
            columns: {type: Array, default: ()=>[
                {name: 'id', label: 'Id', width: '75px'},
                {name: 'title', label: 'Title'},
            ]},
            fields: {type: Array, default: ()=>[
                {name: 'id', label: 'Id', component:'value'},
                {name: 'title', label: 'Title', component:'text'},
            ]},
            primaryKey: {type: String, default: 'id'},
            canCreate: {type: Boolean, default: true},
            canDelete: {type: Boolean, default: true},
            canSearch: {type: Boolean, default: true},
        },   
        data() {
            return {
                values: {},
                formTitle: '',
                formAction: null,
                formMethod: 'POST',
                
                deleteError: null,
            }
        },
        methods: {
            launchEditForm(row) {
                this.values = {};
                this.selectedRowNum = null;
                axios({
                    method: 'get',   
                    params: {page: this.page, search: this.searchQuery},
                    url:    this.resourceUrl+'/'+this.escapeKey(row[this.primaryKey])
                })
                .then(response => {                                             
                    this.values = response.data;
                    
                    this.formTitle = 'Edit';                    
                    this.formAction = this.resourceUrl+'/'+this.escapeKey(this.values[this.primaryKey]);
                    this.formMethod = 'patch';                    
                                        
                    $(this.$refs.formDialog).modal('show');                                         
                })                
            },
            launchCreateForm() {                
                this.values = {};
                this.selectedRowNum = null;
                axios({
                    method: 'get',   
                    params: {page: this.page, search: this.searchQuery},
                    url:    this.resourceUrl+'/create'
                })
                .then(response => {                              
                    this.values = response.data;
                    
                    this.formTitle = 'Create';                    
                    this.formAction = this.resourceUrl;
                    this.formMethod = 'post';                      
                    
                    $(this.$refs.formDialog).modal('show'); 
                })       
            },
            deleteDialog(row) {
                this.deleteError = null;
                this.values = row;
                $(this.$refs.deleteDialog).modal('show');                
            },
            onSuccessSubmit() {
                this.refresh();
            },
            deleteRecord() {                
                this.deleteError = null;
                
                axios({
                    method: 'delete',                       
                    url:    this.resourceUrl+'/'+this.escapeKey(this.values[this.primaryKey])
                })                
                .then(
                    (response) => {    
                        $(this.$refs.deleteDialog).modal('hide'); 
                        this.refresh();
                    },
                    (response) => {                        
                        this.deleteError = response.response.data.message;
                    }                    
                )                  
            },
            refresh() {
                this.$refs.atminForm.errors = {};
                this.$refs.atminForm.error = null; 
                this.$refs.atminTable.loadTable();
                $(this.$refs.formDialog).modal('hide'); 
            },
            escapeKey(k) {
                if(typeof k === 'string') {
                    return encodeURIComponent(k)
                }
                else {
                    return k
                }
                
            }
        }
    }
</script>
