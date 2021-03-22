<template>
    <div class="comments-container" :style="[ isEmptyComments() ? { display: 'none' } : '' ]">
        <div class="comments-header">
            <h1 class="title">{{ this.headerTitle }}</h1>
            <a v-if="!this.isLoggedIn" href="/login">Log in to leave a comment.</a>
        </div>

        <div class="comment-block" v-for="comment in comments" :key="comment.id">
            <comment-card :post-comment="comment"></comment-card>
        </div>

        <div class="show-more" @click="getMoreComments"
            :style="[ !this.pagination ? { display: 'none' } : '' ]">Show More</div>

        <div class="alert alert-info" v-if="!this.pagination">No more comments to display.</div>
    </div>
</template>

<script>
export default {
    props: {
        'postId': Number,
        'title': String
    },
    data() {
        return {
            comments: [],
            page: 1,
            pagination: true,
            headerTitle: "Comments",
            isLoggedIn: $('meta[name=isLoggedIn]').attr('content'),
        }
    },
    created() {
        this.updateCommentStack();

        if (this.title && this.title.length > 0) {
            this.headerTitle = this.title;
        }
    },
    methods: {
        getComments() {
            return axios.get('/comments/?post_id=' + this.postId + '&page='+ this.page)
                .then(function (response) {
                    return response.data['data'];
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        getMoreComments() {
            this.page++;
            this.updateCommentStack();
        },

        updateCommentStack() {
            this.getComments().then(comments => {
                if (comments.length === 0) {
                    this.pagination = false;
                    return;
                }

                comments.forEach((item) => {
                    this.comments.push(item);
                })
            });
        },

        isEmptyComments() {
            return this.comments.length === 0;
        },
    }
}
</script>

<style>
    .show-more {
        background: #29a19c;
        color: white;
        cursor: pointer;
        padding: 5px;
        text-align: center;
        width: 150px;
    }
    .show-more:hover {
        background: #21827e;
    }
    .show-more,
    .alert-info {
        margin: 20px auto;
    }
</style>


<style scoped>
    .comments-container .comments-header {
        align-items: center;
        display: flex;
        justify-content: space-between;
    }
    .comments-container .comment-block:nth-child(even) {
        background: #eeeeee;
    }
</style>
