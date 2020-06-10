<template>    
    <div>
        <div class="bar mb-3">

            <button class="btn btn-primary">
                Edit
            </button>
            
            <div class="btn-group">
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Create
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Blog</a>
                    <a class="dropdown-item" href="#">Post</a>
                  </div>
                </div>
            </div>
            
            <button class="btn btn-primary">Delete</button>            
            <button class="btn btn-primary">Up</button>
            <button class="btn btn-primary">Down</button>
            
        </div>        
        
        <div class="row">
            <div class="col-5">
                <div class="tree">
                    <div v-for="c in children" class="mb-3">
                        <atmin-branch  
                            @select-node="onSelect"
                            
                            :entities    = "entities"
                            :entity-name = "c.name"
                            
                            :fk-field = "c.fk"
                            :fk-value = "null"
                        >
                        </atmin-branch>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="form">
                    <div v-for="c in 100">Form {{c}}</div>
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
            };
        },
        methods: {
            onSelect(id, name) {
                console.log(id, name);
            }
        },
        computed: {
            branches: function(){                               
                //return this.entities[];
            }
        },
        mounted() {
            
        }
    }
</script>
