<template>
    <div class="upload-wrapper">
        <div class="form-group">
            <h3>{{ this.title }}</h3>
            <div class="custom-file w-50">
                <input type="file" class="custom-file-input" id="avatar" name="avatar" @change="previewImage">
                <label class="custom-file-label" for="avatar">Select Image</label>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <span>Preview</span>
                    <div class="avatar-preview" style="background: #0d0d0d; padding: 20px;">
                        <div class="avatar" :style="{ background: 'url(' + avatar + ') center / cover no-repeat' }"></div>
                        <div class="control-panel">
                            <span>Hi {{ this.name }} </span>
                            <div class="options">
                                <a class="option edit" href="#" @click.prevent>Edit Profile</a>
                                <a class="option log-out" href="#" @click.prevent> Log Out </a>
                            </div>
                        </div>
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
        'user': Object
    },
    data() {
        return {
            name: this.user.name,
            avatar: this.user.avatar,
        }
    },
    methods: {
        previewImage(e) {
            if (e.target.files[0].length == 0) return;
            const filereader = new FileReader();
                filereader.readAsDataURL(e.target.files[0]);
                filereader.onload = e => {
                    this.avatar = e.target.result;
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
.avatar-preview {
    text-align: center;
}
.avatar-preview .avatar {
    border-radius: 50%;
    height: 120px;
    max-width: 120px;
    margin: 0 auto;
    overflow: hidden;
    position: relative;
}
.avatar-preview .control-panel {
    color: #eeeeee;
    margin-top: 15px;
}
.avatar-preview .control-panel .options {
    margin: 0 auto;
}
.avatar-preview .control-panel .options > .option {
    display: block;
    margin: 10px 0;
}
.avatar-preview .control-panel .options >.option:hover {
    text-decoration: none;
}
.avatar-preview .control-panel .options > .option:after {
    color: #eeeeee;
    font-family: 'Font Awesome 5 Free';
    padding-left: 5px;
}
.avatar-preview .control-panel .options > .option.edit:after {
    content: "\F044";
}
.avatar-preview .control-panel .options > .option.log-out:after {
    content: "\f2f5";
}
</style>
