const questionMixin = {
    methods: {
        postAnswer: function (formData) {
            return axios.post("/api/questions/answers",formData)
        },
        getAnswers:function(slug){
            return axios.get(`/api/questions/${slug}/answers`)
        }
    }
}
export default questionMixin
