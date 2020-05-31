<template>
    <form>
     
        <atmin-fields :fields="fields" :values="values"></atmin-fields>
        
        <div class="form-group row mt-4">            
            <div :class="[`col-${breakpoint}-${fieldCols}`, `offset-${breakpoint}-${labelCols}`]">                
                <button type="submit" class="btn btn-primary px-5">{{submitText}}</button>                
            </div>
        </div>       
        
        
    </form>  
</template>

<script>
    export default {
        props: ['fields','values'],  
        data(){
            return {
                labelCols: 2,
                breakpoint: 'md',
                submitText: 'OK'
            };
        },
        computed: {
            fieldCols() { 
                return 12 - this.labelCols; 
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
