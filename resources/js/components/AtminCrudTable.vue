<template>
    
    <div>
        
        <button class="btn btn-primary mb-3" @click="launchCreateForm()">
            Create
        </button> 

        <div class="modal fade" tabindex="-1" role="dialog" ref="formDialog">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">{{formTitle}}</h3>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <atmin-form 
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
        
        <atmin-table 
            ref="atminForm"
            :select-buttons="true"
            resource-url = "/resources/demo"
            :columns = "columns"
            @select="launchEditForm($event)"
        ></atmin-table>
        
    </div>
        
</template>

<script>
    export default {
        props: {
            resourceUrl: {type: String},
            columns: {type: Array},
            fields: {type: Array},
        },   
        data() {
            return {
                values: {},
                formTitle: '',
                formAction: null,
                formMethod: 'POST'
            }
        },
        methods: {
            launchEditForm(row) {
                this.values = {};
                this.selectedRowNum = null;
                axios({
                    method: 'get',   
                    params: {page: this.page, search: this.searchQuery},
                    url:    this.resourceUrl+'/'+row.id                  
                })
                .then(response => {                                             
                    this.values = response.data;
                    
                    this.formTitle = 'Edit';                    
                    this.formAction = this.resourceUrl+'/'+this.values.id;
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
            store() {                
            }, 
            update() {                  
            }, 
            destroy() {                
            }
        },
        computed: {
        },
        mounted() {
      
        }
    }
</script>
