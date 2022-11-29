<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Answers</div>
                    <div v-if="isAnswersLoading" class="card-body font-weight-bold">
                        Loading answers ...
                    </div>
                    <div v-else class="card-body">
                       <div class="d-flex flex-column">
                           <answer-component v-for="ans in answers.data" :key="ans.id" :answer="ans">
                               {{ans.body}}
                           </answer-component>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AnswerComponent from "./answers/AnswerComponent";
    export default {
        components:[AnswerComponent],
        mounted() {
            console.log('Component mounted.')
            // axios.post("/api/questions/1/answers",{
            //     question_id:1,
            //     body:"hello"
            // }).then(res=>console.log(res.json()));
            this.isAnswersLoading = true
            axios.get("/api/questions/1/answers").then( data => {
                this.answers = data.data.data;
                setTimeout(()=>this.isAnswersLoading = false,30000)
            }).catch(this.isAnswersLoading=false);
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

        },

    }
</script>
