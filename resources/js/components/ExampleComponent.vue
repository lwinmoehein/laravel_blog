<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <button class="card-body" @click="addCount">
                        {{ count }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                count:0
            }
        },
        methods:{
            addCount(){
                this.count++;
            }
        }
    }
</script>
