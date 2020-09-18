<template>
    <div class="replies-container" v-if="replies.length !== 0">
        <div class="divider"></div>
        <div class="comment-card" v-for="reply in replies" :key="reply.id" :style="{ borderLeft: '3px dashed ' + randomizeBorderColor() }">
            <div class="header">
                <div class="avatar">
                    <avatar :image="reply.user.avatar" size="medium"></avatar>
                </div>
                <span class="meta author">{{ reply.user.name }}</span>
                <span class="meta date">{{ reply.created_at }}</span>
            </div>
            <div class="body" v-html="reply.body"></div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        thread: {
            type: Number
        }
    },
    data() {
        return {
            parent_id: this.thread,
            replies: []
        }
    },
    created() {
        this.getReplies().then(replies => {
            replies.forEach((item) => {
                this.replies.push(item);
            })
        });
    },
    methods: {
        getReplies() {
            return axios.get('/comments/reply/thread/' + this.parent_id)
                .then(function (response) {
                    return response.data['data'];
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        randomizeBorderColor() {
            return '#' + Math.floor(100000 + Math.random() * 900000);
        }
    }
}
</script>

<style scoped>
    .replies-container {
        margin-top: 20px;
    }
    .replies-container .divider {
        border-top: 1px solid #29a19c;
        margin: 0 auto;
        width: 450px;
    }
    .replies-container .comment-card {
        margin: 30px 50px;
    }
    .replies-container .comment-card:before {
        content: "";
    }
</style>
