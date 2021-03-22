<template>
    <div class="avatar" :class="[ { default: isDefaultAvatar() }, iconSize ]">
        <img :src="imgSrc"/>
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
        },
        preview: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            imgSrc: this.src,
            iconSize: this.size,
            isPreview: this.preview
        }
    },
    created() {
        if (this.isPreview) {
            this.$eventBus.$on('preview', (newAvatar) => {
                this.imgSrc = newAvatar;
            });
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
        width: 100%;
    }
    .avatar.default > img {
        display: none;
    }
</style>
