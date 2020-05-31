<template>
    
    <div>
    
        <div class="custom-file">
            <input :id="'field-'+name" type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>    

        <p>
            <a :href="value.download" class="mr-5">Download</a>
            Size: {{size}}
        </p>
             
    
    </div>
    
</template>

<script>
    export default {
        props: ['name', 'value'],
        computed: {
            size() {
                const v = this.value.size;
                
                if(v > 0) {
                    if(v < 1000) {
                        return v + 'B';
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
            }
        }

    }
</script>
