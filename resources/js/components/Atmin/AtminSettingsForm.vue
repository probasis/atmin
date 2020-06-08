<template>
    <div>
        <atmin-form
            :action="resourceUrl"
            :values-url="resourceUrl"
            method="patch"
            :fields="fields"        
            :ajax="true"  
            @success-submit="onSuccessSubmit"
        ></atmin-form>
        
<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="position: static: min-height: 200px;"> 
        
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"  ref="toast" data-delay="3000">
            <div class="toast-header">
                <strong class="mr-auto">Saved</strong>                
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Data has been saved
            </div>
        </div>        
      
    
</div>          
        
    </div>
</template>

<script>
    export default {
        props: {
            resourceUrl: {type: String},
            fields: {type: Array},
        },   
        data(){
            return {
            };
        },
        methods: {
            onSuccessSubmit() {
                $(this.$refs.toast).toast('show');
            }
        },
        computed: {
        },
        mounted() {
        }
    }
</script>
