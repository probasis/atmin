<template>    

    <div class="tree">
        SELECTED: {{selectedEntityName}}/{{selectedRowId}}

        <div v-for="c in children">
            <atmin-branch  
                @select-node="onSelect"

                :selected-entity-name = "selectedEntityName"
                :selected-row-id      = "selectedRowId"                            

                :entities    = "entities"
                :entity-name = "c.name"

                :fk = "c.fk"
                :fk-value = "null"
            >
            </atmin-branch>
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
    
    .branch-row {
        cursor: pointer;
    }
    
    .branch-row:hover {
        background-color: #eee;        
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
                selectedRowId: 0
            };
        },
        methods: {
            onSelect(selectedRow, selectedEntity) {
                for(let name in this.entities) {                    
                    if(this.entities[name] === selectedEntity) {
                        this.selectedEntityName = name;
                    }                    
                }   
                this.selectedRowId = selectedRow.id;
            }
        },
        computed: { 
        },
        mounted() {            
        }
    }
</script>
