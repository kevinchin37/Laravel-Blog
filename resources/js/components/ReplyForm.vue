<template>
   <div class="editor">
        <a href="#reply" class="float-right mb-3" @click="renderForm">Reply</a>

        <form @submit="submitForm" v-if="formActive">
            <input type="hidden" name="_token" :value="csrf">
            <Editor api-key="my-key" :init="settings" name="body" v-model="bodyText"></Editor>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
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
        parent: {
            type: Number
        },
        post: {
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
            formAction: this.action,
            formActive: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            bodyText: '',
            parentId: this.parent,
            postId: this.post,
        }
    },
    methods: {
        renderForm(e) {
            e.preventDefault();
            this.formActive = !this.formActive;
        },

        submitForm(e) {
            axios.post(this.formAction, {
                body: this.bodyText,
                post_id: this.postId,
                parent_id: this.parentId,
            }).then(res=>console.log(res))
            .catch(err=>console.log(err))
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
