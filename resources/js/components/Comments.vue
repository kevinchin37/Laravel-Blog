<template>
    <div class="comments-container" :style="[ isEmptyComments() ? { display: 'none' } : '' ]">
        <h1>Comments</h1>
        <div class="comment-card" v-for="comment in comments" :key="comment.id">
            <div class="header">
                <div class="avatar">
                    <avatar :src="comment.user.avatar" size="medium"></avatar>
                </div>
                <span class="meta author">{{ comment.user.name }}</span>
                <span class="meta date">{{ comment.created_at }}</span>
            </div>

            <div class="body" v-html="comment.body"></div>

        <reply-form :parent="comment.id" :post="comment.post_id"></reply-form>
        <replies :thread="comment.id"></replies>
        </div>

        <div class="show-more" @click="getMoreComments"
            :style="[ !this.pagination ? { display: 'none' } : '' ]">Show More</div>

        <div class="alert alert-info" v-if="!this.pagination">No more comments to display.</div>
    </div>
</template>

<script>
export default {
    props: {
        'post_id': Number
    },
    data() {
        return {
            comments: [],
            page: 1,
            postId: this.post_id,
            pagination: true,
        }
    },
    created() {
        this.updateCommentStack();
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
    .comment-card {
        overflow: hidden;
        padding: 20px 35px;
    }
    .comment-card .header {
        color: #21827e;
        margin-bottom: 30px;
        min-height: 30px;
        overflow: hidden;
        position: relative;
    }
    .comment-card .header .avatar {
        float: left;
        margin-right: 8px;
    }
    .comment-card .header .meta {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }
    .comment-card .header .meta.date {
        right: 0;
    }
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
    .comments-container .comment-card .body {
        padding: 0 25px;
    }
    .comments-container .comment-card:nth-child(even) {
        background: #eeeeee;
    }
</style>
