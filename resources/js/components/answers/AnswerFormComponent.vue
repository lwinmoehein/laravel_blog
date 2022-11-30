<template>
    <div class="container">
        <form>
            <div class="for-group row">
                <div class="col-12 p-0">
                    <label for="title">Write an answer for this question</label>
                    <textarea class="form-control" v-model="answerText" cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col-12  d-flex justify-content-start px-0">
                    <div  @click.prevent="onPostAnswerClick" class="btn btn-primary d-flex justify-content-center align-items-center px-5 py-1" >
                        <span class="mr-3">Upload Answer</span>
                        <span class="text-white" :class="{'spinner-border':isAnswerPosting}"></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import questionMixin from "../../mixins/question"
export default {
    name: "AnswerFormComponent",
    mixins:[questionMixin],
    props:{
        question:{
            type:Object
        }
    },
    computed:{
        postAnswerFormData(){
            const formData = new FormData()
            formData.append("question_id",this.question.id)
            formData.append("body",this.answerText)

            return formData
        },
        isFormValid(){
            return this.answerText!=="" && this.answerText!==null
        }
    },
    data(){
        return {
            answerText:"",
            isAnswerPosting:false
        }
    },
    methods:{
        async onPostAnswerClick(){
            if(!this.isFormValid) return

            this.isAnswerPosting = true
            const response = await this.postAnswer(this.postAnswerFormData);
            if(response.status===201){
                this.$emit('on-answer-post-click')
                this.answerText = ""
            }
            this.isAnswerPosting = false
        }
    }
}
</script>

<style scoped>

</style>
