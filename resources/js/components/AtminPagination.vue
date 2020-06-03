<template>
    <nav>
      <ul class="pagination">
        <li class="page-item" :class="{disabled: !(this.currentPage > 1)}">
            <a class="page-link" href="#" aria-label="Previous" @click.prevent="prevPage()">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        
        <template v-for="p in lastPage">
            <li class="page-item" :class="{active: p==currentPage}" v-if="Math.abs(p-currentPage) <= gap">
                <a class="page-link" href="#" @click.prevent="setPage(p)">{{p}}</a>
            </li>
        </template>        
        
        <li class="page-item" :class="{disabled: !(this.currentPage < this.lastPage)}">
          <a class="page-link" href="#" aria-label="Next" @click.prevent="nextPage()">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
</template>

<script>
    export default {
        props: {            
            gap: {type: Number, default: 5},
            lastPage: {type: Number, default: 1}
        },   
        data(){
            return {
                currentPage: 1                
            }
        },
        methods: {
            prevPage() {
                if(this.currentPage > 1) {
                    this.setPage(this.currentPage - 1);
                }
            },
            nextPage() {
                if(this.currentPage < this.lastPage) {
                    this.setPage(this.currentPage + 1);
                }
            },            
            setPage(page) {
                this.currentPage = page;
                this.$emit('change', this.currentPage);
            }
        },
        computed: {
        },
        mounted() {
            
        }
    }
</script>
