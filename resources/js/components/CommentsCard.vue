<template>
    <div class="comment">
        <div class="header">
            <div class="avatar">
                <avatar :src="comment.user.avatar" size="medium" :preview="this.preview"></avatar>
            </div>
            <span class="meta author">{{ comment.user.name }}</span>
            <span class="meta date">{{ comment.created_at }}</span>
        </div>

        <div class="body" v-html="comment.body"></div>
        <reply-form :parent-comment="comment.id" :post-id="comment.post_id" v-show="!this.preview"></reply-form>
    </div>
</template>

<script>
export default {
    props: {
        'postComment': Object,
        'preview': {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            comment: this.postComment,
        }
    }
}
</script>

<style>
    .comment {
        overflow: hidden;
        padding: 20px 35px;
    }
    .comment .header {
        color: #21827e;
        margin-bottom: 30px;
        min-height: 30px;
        overflow: hidden;
        position: relative;
    }
    .comment .header .avatar {
        float: left;
        margin-right: 8px;
    }
    .comment .header .meta {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }
    .comment .header .meta.date {
        right: 0;
    }
    .comment .body {
        padding-left: 25px;
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
    /* .comments-container .comment .body {
        padding: 0 25px;
    }
    .comments-container .comment:nth-child(even) {
        background: #eeeeee;
    } */
</style>
