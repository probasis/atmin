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
        
        <div class="modal" tabindex="-1" role="dialog" ref="successAlert">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Done</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Changes saved</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                
              </div>
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
                $(this.$refs.successAlert).modal('show');
            }
        },
        computed: {
        },
        mounted() {
        }
    }
</script>
