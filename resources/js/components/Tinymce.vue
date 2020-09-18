<template>
   <div>
        <Editor api-key="key" :init="settings" :name="formName" :value="formValue"></Editor>
   </div>
</template>

<script>
import Editor from '@tinymce/tinymce-vue';

export default {
    components: {
        Editor
    },
    props: {
        name: {
            default: 'body',
            type: String
        },
        value: {
            default: ''
        }
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
            formName: this.name,
            formValue: this.value,
            key: process.env.MIX_TINY_MCE_KEY
        }
    },
    created() {
        console.log(this.formName);
    }
}
</script>

<style scoped>
</style>
