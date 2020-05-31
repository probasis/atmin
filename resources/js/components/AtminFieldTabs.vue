<template>
    <div>
        <ul class="nav nav-tabs mb-3">
            <li v-for="(tab, t) in params.tabs" class="nav-item">
                <a class="nav-link" :class="{active: t==currentTab}" href="#" @click.prevent="changeTab(t)">{{tab.title}}</a>
            </li>      
        </ul>

        <div v-for="(tab, t) in params.tabs" v-show="t==currentTab">
            <atmin-fields :fields="tab.fields" :values="values"></atmin-fields>
        </div>
    </div>
    
</template>

<script>
    export default {
        props: ['params', 'values'],
        data() {
            return {
                currentTab: 0
            }
        },
        methods: {
            changeTab(t) {
                this.currentTab = t;
            }
        }
    }
</script>
