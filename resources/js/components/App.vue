<template>
    <div v-if="article !== null" class="article-notification">
        <div class="article-notification-content">
            <div class="article-notification-title">
                Добавлена новая статья
            </div>

            <div class="article-notification-text">
                <a :href="`/articles/${article.id}`">
                    {{ article.name }}
                </a>
            </div>

            <button
                type="button"
                class="article-notification-close"
                @click="closeNotification"
            >
                ×
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            article: null,
        };
    },

    created() {
        window.Echo
            .channel('test')
            .listen('NewArticleEvent', (data) => {
                console.log('Получено уведомление:', data);

                this.article = data.article;
            });
    },

    methods: {
        closeNotification() {
            this.article = null;
        },
    },
};
</script>