<template>
    <div class="my-3 reply-item d-flex flex-column">
<!--        <p class="mb-0"><span class="text-primary font-weight-bold">{{answer.user.name}}</span>-->
<!--        </p>-->
        <p class="reply-body mb-0">{{answer.body}}</p>

        <div>
            <input type="hidden">

            <input type="button" class="btn text-info  bg-transparent rounded-sm px-1 py-0 reply-reply-btn"
                 value="reply comment"/>
            <div class="text-form comment-edit-form mx-5 mt-3" style="display: none">
                <div class="form-group ">
                <textarea class="form-control reply-edit-textarea"
                          cols="5" rows="2">{{answer.body}}</textarea>
                    <button class="mt-2 update nav-link btn">Update Answer</button>
                </div>
            </div>
            <div class="text-form comment-reply-form  mx-5 mt-3" style="display: none">
                <div class="form-group ">
                    <textarea class="form-control reply-reply-textarea" cols="5" rows="2"></textarea>
                    <button class="mt-2 nav-link btn reply" > Add Reply
                    </button>
                </div>
            </div>
        </div>
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
