<template>
    <div class="avatar"
        :class="[ { default: isDefaultAvatar() }, iconSize ]"
        :style="[ isDefaultAvatar() ? '' : { background: 'url(' + this.src + ') center / cover no-repeat' } ]"
    ></div>
</template>

<script>
export default {
    props: {
        image: {
            default: ''
        },
        size: {
            default: 'large',
        }
    },
    data() {
        return {
            src: this.image,
            iconSize: this.size
        }
    },
    methods: {
        isDefaultAvatar() {
            if (this.src === null || this.src.length === 0) return true;
        }
    }
}
</script>

<style scoped>
    .avatar {
        border-radius: 50%;
        height: 30px;
        width: 30px;
    }
    .avatar.small {
        height: 30px;
        width: 30px;
    }
    .avatar.medium {
        height: 60px;
        width: 60px;
    }
    .avatar.large {
        height: 120px;
        width: 120px;
    }
    .avatar.default {
        background: url('/images/placeholders/default-avatar.jpg') center / cover no-repeat;
    }
</style>
