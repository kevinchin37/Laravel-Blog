<template>
    <div class="upload-wrapper">
        <div class="form-group">
            <h3>{{ this.title }}</h3>
            <div class="custom-file w-50">
                <input type="file" class="custom-file-input" id="avatar" name="avatar" @change="preview">
                <label class="custom-file-label" for="avatar">Select Image</label>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                   <div class="preview">
                        <span class="title">Preview</span>
                        <profile-card
                            :preview="true"
                            :user="this.user"
                            :avatar="{ filename: this.image.filename, filepath: this.image.filepath }"
                        ></profile-card>
                   </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        'title': String,
        'user': Object,
        'avatar': Object,
    },
    data() {
        return {
            name: this.user.name,
            image: this.avatar
        }
    },
    methods: {
        preview(e) {
            if (e.target.files[0].length == 0) return;

            const filereader = new FileReader();
            filereader.readAsDataURL(e.target.files[0]);
            filereader.onload = e => {
                this.$eventBus.$emit('preview', e.target.result);
            };
        }
    }
}
</script>

<style scoped>
.upload-wrapper {
    background: #f5f5f5;
    padding: 25px 15px;
}
.upload-wrapper .preview {
    background: #0d0d0d;
    padding: 20px;
}
.upload-wrapper .preview .title {
    color: white;
    font-size: 18px;
}
</style>
