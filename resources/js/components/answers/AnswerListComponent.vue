<template>
    <div>
        <hr/>
        <div>
                    <h5 class="font-weight-bold">Answers</h5>
                    <div v-if="isAnswersLoading" class="font-weight-bold">
                        Loading answers ...
                    </div>
                    <div v-else>
                       <div class="d-flex flex-column">
                           <answer-component v-for="ans in answers" :key="ans.id" :answer="ans">
                               {{ans.body}}
                           </answer-component>
                       </div>
                    </div>
                </div>
                <answer-form-component :question="question" @on-answer-post-click="onAnswerPostClick"/>
    </div>
</template>

<script>
import AnswerComponent from "./AnswerComponent"
import AnswerFormComponent from "./AnswerFormComponent"
import questionMixin from "../../mixins/question"

    export default {
        name:"AnswerListComponent",
        mixins:[questionMixin],
        props:{
            question:{
                type:Object
            }
        },
        components:[AnswerComponent],
        async mounted() {
            await this.fetchAnswers()
        },
        data(){
            return {
               answers:{
                   type:Object
               },
                isAnswersLoading :false
            }
        },
        methods:{
            async onAnswerPostClick(){
                await  this.fetchAnswers()
            },
            async fetchAnswers(){
                this.isAnswersLoading = true
                const response = await this.getAnswers(this.question.slug)
                if(response.status===200){
                    this.isAnswersLoading = false
                    this.answers = response.data.data.data
                }else{
                    this.isAnswersLoading = false
                }
            }
        },

    }
</script>
