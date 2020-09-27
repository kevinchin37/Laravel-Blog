<template>
    <div class="avatar" :class="[ { default: isDefaultAvatar() }, iconSize ]">
        <img :src="src"/>
    </div>
</template>

<script>
export default {
    props: {
        src: {
            default: ''
        },
        size: {
            default: 'medium',
        }
    },
    data() {
        return {
            imgSrc: this.src,
            iconSize: this.size
        }
    },
    methods: {
        isDefaultAvatar() {
            if (this.imgSrc === null || this.imgSrc.length === 0) return true;
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
    .avatar > img {
        border-radius: 50%;
        height: 100%;
        max-width: 100%;
    }
</style>
