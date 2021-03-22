<template>
    <div class="editor">
        <a href="#reply" class="float-right mb-3" @click="toggleForm">Reply</a>

        <form @submit="submitForm" v-if="formActive">
            <div v-if="!this.isLoggedIn" class="alert alert-danger">Must be logged in to leave a comment.</div>
            <input type="hidden" name="_token" :value="csrf">
            <Editor api-key="my-key" :init="settings" name="body" v-model="bodyText"></Editor>
            <button type="submit" class="btn btn-primary mt-3" :disabled="!this.isLoggedIn">Submit</button>
        </form>

        <replies :thread="this.parentId"></replies>
    </div>
</template>

<script>
import Editor from '@tinymce/tinymce-vue';

export default {
    components: {
        Editor
    },
    props: {
        action: {
            type: String,
            default: '/post/comment/reply'
        },
        replyButton: {
            type: Boolean,
            default: false
        },
        parentComment: {
            type: Number,
        },
        postId: {
            type: Number
        },
    },
    data() {
        return {
            settings: {
                height: 300,
                menubar: false,
                toolbar:
                'undo redo | formatselect | bold italic backcolor | \
                alignleft aligncenter alignright alignjustify | \
                bullist numlist outdent indent | removeformat | help'
            },
            formActive: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            bodyText: '',
            parentId: this.parentComment,
            isLoggedIn: $('meta[name=isLoggedIn]').attr('content'),
        }
    },
    methods: {
        toggleForm(e) {
            e.preventDefault();
            this.bodyText = '';
            this.formActive = !this.formActive;
        },

        submitForm(e) {
            e.preventDefault();

            axios.post(this.action, {
                body: this.bodyText,
                post_id: this.postId,
                parent_id: this.parentId,
            }).then(res => {
                this.$eventBus.$emit('newReply', this.parentId);
                this.toggleForm(e);
            })
            .catch(err => console.log(err))
        }
    }
}
</script>

<style scoped>
    .editor {
        overflow: hidden;
    }
    .editor form {
        clear: both;
    }
    .editor .reply-button {
        border-bottom: 1px solid black;
    }
</style>
