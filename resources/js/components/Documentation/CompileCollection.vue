<template>
    <div>
        <div class="single-post-title">
            <div class="post-date">March 13, 2021</div>
            <h1>{{ info.name }}</h1>
            <div class="post-author-container">
                <div class="post-author">Collected </div>
                <div class="by-text">by</div>
                <div class="post-author">James Anderson</div>
            </div>
            <p class="post-summary font-anek">{{ info.description }}</p>
        </div>

        <div class="main-container">
            <div class="post-body w-richtext">
                <ol class="relative border-l ml-3 border-gray-200 dark:border-gray-700">
                    <collection-forlder v-for="item in items" :key="item.name+Math.random().toString(16).slice(2)" :forlder="item" />
                </ol>
            </div>
        </div>
    </div>
</template>
<script>
    import VMdPreview from '@kangc/v-md-editor/lib/preview';
    import '@kangc/v-md-editor/lib/style/preview.css';

    // Introduce the theme you use. Take the github theme as an example here
    import githubTheme from '@kangc/v-md-editor/lib/theme/github';
    import '@kangc/v-md-editor/lib/theme/style/github.css';

    // Support Code copier
    import '@kangc/v-md-editor/lib/theme/style/github.css';
    import createCopyCodePlugin from '@kangc/v-md-editor/lib/plugins/copy-code/index';

    // Suport line number
    import '@kangc/v-md-editor/lib/plugins/copy-code/copy-code.css';
    import createLineNumbertPlugin from '@kangc/v-md-editor/lib/plugins/line-number/index';

    // Support Emoji
    import createEmojiPlugin from '@kangc/v-md-editor/lib/plugins/emoji/index';
    import '@kangc/v-md-editor/lib/plugins/emoji/emoji.css';

    // highlightjs
    import hljs from 'highlight.js';

    VMdPreview.use(githubTheme, { Hljs: hljs, codeHighlightExtensionMap: { vue: 'xml' }, });
    VMdPreview.use(createCopyCodePlugin());
    VMdPreview.use(createLineNumbertPlugin());
    VMdPreview.use(createEmojiPlugin());

    Vue.use(VMdPreview);

    export default {
        props: {
            contents: {
                type: String,
                default: '### patienceman shared content loading',
            },
            collection: { required: true }
        },
        computed: {
            authUser: {
                get() {
                    return JSON.parse(this.user);
                },
            },
            postCollection: {
                get() {
                    return JSON.parse(this.collection);
                },
            },
        },
        data(){
            return {
                info: {},
                items: {},
                preparedCollection: {},
                isLoading: false,
            };
        },
        methods: {
            async getCollections() {
                this.isLoading = true;
                this.collections = [];

                await this.inspectCollection(this.postCollection.collection_url).then((result) => {
                    this.preparedCollection = { ...this.postCollection, file: result };
                });

                this.isLoading = false;
            },
            async inspectCollection(path) {
                let result = fetch(`/storage/${path}`)
                    .then((response) => response.json())
                    .then((json) => json );

                return await result;
            },
            async createMarkDownFromCollection() {
                await this.getCollections();

                this.info = this.preparedCollection.file.info;
                this.items = this.preparedCollection.file.item;
            },
        },
        mounted() {
            this.createMarkDownFromCollection();
        },
    };
</script>
