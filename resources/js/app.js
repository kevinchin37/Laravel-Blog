/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('avatar-uploader', require('./components/AvatarUploader.vue').default);
Vue.component('profile-card', require('./components/ProfileCard.vue').default);
Vue.component('avatar', require('./components/Avatar.vue').default);
Vue.component('comments', require('./components/Comments.vue').default);
Vue.component('comment-card', require('./components/CommentsCard.vue').default);
Vue.component('tinymce-editor', require('./components/Tinymce.vue').default);
Vue.component('reply-form', require('./components/replyForm.vue').default);
Vue.component('replies', require('./components/Replies.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.prototype.$eventBus = new Vue();

const app = new Vue({
    el: '#app',
});
