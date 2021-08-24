<template>
    <div>
        <h1>Hello World</h1>
    </div>
</template>


<script>
export default {
    fetchComments() {
    const t = this;

    axios.get('/comments')
        .then(({data})) => {
            t.comments = data;
        };
},

created() {
    this.fetchComments();
},

data: function() {
    return {
        state: 'default',
        data:{
            body: ''
        },
        comments:[]
    }
},

saveComment() {
    const t = this;

    axios.post('/comments', t.data)
        .then(({data})) => {
            t.comments.unshift(data);

            t.stopEditing();
        };
},
commentIndex(commentId) {
    return this.comments.findIndex((element) => {
        return element.id === commentId;
    });
}
}
</script>
