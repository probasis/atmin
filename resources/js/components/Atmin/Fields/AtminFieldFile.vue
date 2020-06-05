<template>
    
    <div>    
        <div class="custom-file">
            <input 
                :id="'field-'+name" 
                :name="name"
                type="file" 
                class="custom-file-input" 
                id="customFile"
            >
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>    
        
        <a v-if="value && value.download" :href="value.download" class="btn btn-link">Download</a>
        <div v-if="value && value.download" class="d-inline-block mx-3">{{extension}}</div>           
        <div v-if="value && value.size" class="d-inline-block">{{size}}</div>    
    </div>
    
</template>

<script>
    export default {
        props: {
            name: {type: String}, 
            value: {type: Object} 
        },
        computed: {
            size() {
                const v = this.value.size;
                
                if(v > 0) {
                    if(v < 1000) {
                        return v + ' B';
                    }
                    else if(v < 1000000) {
                        return Math.ceil(v/1000) + ' KB';
                    }
                    else {
                        return Math.ceil(v/1000000) + ' MB';
                    }
                }
                else {
                    return '-';
                }
            },
            extension() {
                if(!this.value) {
                    return '';
                }
                
                const m =/\.(\w+)$/.exec(this.value.download);
                if(m) {
                    return m[1];
                }
                else {
                    return '';
                }
                
            }
        }

    }
</script>
