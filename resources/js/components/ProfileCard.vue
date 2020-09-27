<template>
    <div class="profile-card">
        <div class="avatar-wrapper">
            <avatar :src="this.image" size="large"></avatar>
        </div>

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
        'avatar': String,
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
                this.image = newAvatar;
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
            return (this.image == "" || !this.image);
        }
    }
}
</script>

<style scoped>
    .profile-card {
        margin: 20px 0;
        text-align: center;
    }
    .profile-card .avatar-wrapper {
        border-radius: 50%;
        height: 120px;
        max-width: 120px;
        margin: 0 auto;
        margin-bottom: 20px;
        overflow: hidden;
        position: relative;
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
