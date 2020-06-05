<template>
    
    <ul class="pagination" v-if="lastPage > 1">
        <li class="page-item" :class="{disabled: !(this.page > 1)}">
            <a class="page-link" href="#" aria-label="Previous" @click.prevent="prevPage()">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        <template v-for="p in lastPage">
            <li class="page-item" :class="{active: p==page}" v-if="Math.abs(p-page) <= gap">
                <a class="page-link" href="#" @click.prevent="setPage(p)">{{p}}</a>
            </li>
        </template>        

        <li class="page-item" :class="{disabled: !(this.page < this.lastPage)}">
            <a class="page-link" href="#" aria-label="Next" @click.prevent="nextPage()">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
    
</template>

<script>
    export default {
        props: {            
            gap:        {type: Number, default: 5},
            lastPage:   {type: Number, default: 1},
            page:       {type: Number, default: 1}
        },   
        data(){
            return {                
            }
        },
        methods: {
            prevPage() {
                if(this.page > 1) {
                    this.setPage(this.page - 1);
                }
            },
            nextPage() {
                if(this.page < this.lastPage) {
                    this.setPage(this.page + 1);
                }
            },            
            setPage(page) {                
                this.$emit('change', page);
            }
        },
        computed: {
        }
    }
</script>
