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
            <div class="col-3">
                <div class="tree">
                    <div v-for="c in 50">Tree {{c}}</div>
                </div>
            </div>
            <div class="col-9">
                <div class="form">
                    <div v-for="c in 100">Form {{c}}</div>
                </div>
            </div>            
        </div>        
    </div>
</template>

<style>
    .tree {background-color: #eef}
    .form {background-color: #fee}
    .bar  {background-color: #eff}
    
    .bar {
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
         
        },   
        data(){
            return {
            };
        },
        methods: {
        },
        computed: {
        },
        mounted() {

        }
    }
</script>
