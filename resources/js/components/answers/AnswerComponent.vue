<template>
    <div class="my-3 reply-item d-flex flex-column">
        <p class="mb-0"><span class="text-primary font-weight-bold">{{answer.user.name}} . </span>  <small>{{answer.time}}</small>
        </p>
        <p class="reply-body mb-0">{{answer.body}}</p>
    </div>
</template>

<script>
export default {
    name: "AnswerComponent",
    props:{
        answer:{}
    }
}
</script>

<style scoped>

</style>
