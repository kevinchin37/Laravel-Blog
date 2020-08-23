<template>
    <div class="profile-card">
        <div class="avatar"
            :class="{ default: isDefaultAvatar() }"
            :style="[ isDefaultAvatar() ? '' : { background: 'url(' + this.image.filepath + ') center / cover no-repeat' } ]"
        ></div>
        <div class="control-panel">
            <span>Hi {{ this.name }} </span>
            <div class="options">
                <a class="option edit" :href="'/admin/user/' + this.id + '/profile/edit'" @click="preventClickThrough">Edit Profile</a>
                <a class="option log-out" href="/logout" @click="preventClickThrough"> Log Out </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        'user': Object,
        'avatar': Object,
        'preview': {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            id: this.user.id,
            name: this.user.name,
            image: this.avatar,
            isPreview: this.preview,
        }
    },
    created() {
        if (this.isPreview) {
            this.$eventBus.$on('preview', (newAvatar) => {
                this.image.filename = 'upload';
                this.image.filepath = newAvatar;
            });
        }
    },
    methods: {
        preventClickThrough(e) {
            if (this.isPreview) {
                e.preventDefault();
            }
        },
        isDefaultAvatar() {
            return (this.image.filename.length == "" || !this.image.filename);
        }
    }
}
</script>

<style scoped>
.profile-card {
    margin: 20px 0;
    text-align: center;
}
.profile-card .avatar {
    border-radius: 50%;
    height: 120px;
    max-width: 120px;
    margin: 0 auto;
    margin-bottom: 20px;
    overflow: hidden;
    position: relative;
}
.profile-card .avatar.default {
    background: url('/images/placeholders/default-avatar.jpg') center / cover no-repeat;
}
.profile-card .control-panel {
    color: #eeeeee;
}
.profile-card .control-panel .options {
    margin: 0 auto;
}
.profile-card .control-panel .options > .option {
    display: block;
    margin: 5px 0;
}
.profile-card .control-panel .options >.option:hover {
    text-decoration: none;
}
.profile-card .control-panel .options > .option:after {
    color: #eeeeee;
    font-family: 'Font Awesome 5 Free';
    padding-left: 5px;
}
.profile-card .control-panel .options > .option.edit:after {
    content: "\F044";
}
.profile-card .control-panel .options > .option.log-out:after {
    content: "\f2f5";
}
</style>
