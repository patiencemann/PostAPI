<template>
    <div id="downloadable" class="flex relative">

        <!-- GET CAURSE CONTENT OF THE DOC AND SHARE -->
        <div><about-collection-and-share
            :page_description="info.description"
            :page_title="info.name"
            :collection_items="items"
        /></div>

        <!-- PUBLISH COLLECTION -->
        <div><publish-collection /></div>

        <div class="post-contents-wrapper">
            <div class="single-post-title">
                <div class="post-date" style="letter-spacing: 1">
                    {{ format(postCollection.created_at) }}
                </div>
                <div class="relative">
                    <h1 class="flex">{{ data.name }}
                        <span @click="openEditor('_title_')" id="*_title_" class="editBtn border border-gray-200 ml-2 bg-gray-100 rounded-circle w-8 h-8 flex items-center justify-center text-gray-500 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                        </span>
                    </h1>

                    <div class="hidden" id="#_title_">
                        <div class="absolute -bottom-14 z-20 w-auto border border-gray-100 rounded-[10px] bg-white px-3 py-2.5 shadow-md shadow-shadow-200 dark:!bg-navy-800 dark:shadow-none md:w-[365px] md:flex-grow-0 md:gap-1 xl:w-[365px] xl:gap-2">
                            <div class="flex flex-grow items-center justify-center relative">
                                <div>
                                    <input v-model="data.name" type="text" id="helper-text" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title...">
                                </div>
                                <div class="ml-3">
                                    <button @click="submitDocTitle" class="relative cursor-pointer inline-flex h-10 w-20 items-center justify-center rounded-lg border border-transparent text-white bg-gray-800 hover:bg-gray-900 px-2 py-1 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-75">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="ml-2">
                                    <button @click="closeEditor('_title_')" class="relative cursor-pointer inline-flex h-10 w-20 items-center justify-center rounded-lg border border-transparent text-white bg-gray-400 hover:bg-gray-900 px-2 py-1 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-75">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <div :id="'*_title_spinner_'+uniqueIdentifier" class="hidden">
                                    <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full backdrop-blur-sm z-10 rounded-[10px] flex items-center justify-center">
                                        <span class="relative inset-0 inline-flex h-6 w-6 animate-spin items-center justify-center rounded-full border-2 border-gray-300 after:absolute after:h-8 after:w-8 after:rounded-full after:border-2 after:border-y-indigo-500 after:border-x-transparent"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-author-container">
                    <div class="post-author">Collected</div>
                    <div class="by-text">by</div>
                    <div class="post-author">{{ collector.name }}</div>
                </div>
                <div class="relative">
                    <p class="post-summary font-anek flex relative">
                        {{ data.description }}
                        <span @click="openEditor('_desc_')" id="*_desc_" class="editBtn absolute bottom-0 right-0 border border-gray-200 ml-2 bg-gray-100 rounded-circle w-8 h-8 flex items-center justify-center text-gray-500 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                        </span>
                    </p>
                    <div class="hidden" id="#_desc_">
                        <div class="absolute -bottom-14 z-20 w-auto border border-gray-100 rounded-[10px] bg-white px-3 py-2.5 shadow-md shadow-shadow-200 dark:!bg-navy-800 dark:shadow-none md:w-[365px] md:flex-grow-0 md:gap-1 xl:w-[365px] xl:gap-2">
                            <div class="flex flex-grow items-center justify-center relative">
                                <div>
                                    <textarea v-model="data.description" id="message" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                                </div>
                                <div>
                                    <button @click="submitDocDesc" class="relative cursor-pointer inline-flex h-10 w-20 items-center justify-center rounded-lg border border-transparent text-white bg-gray-800 hover:bg-gray-900 px-2 py-1 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-75">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <div>
                                    <button @click="closeEditor('_desc_')" class="relative cursor-pointer inline-flex h-10 w-20 items-center justify-center rounded-lg border border-transparent text-white bg-gray-400 hover:bg-gray-900 px-2 py-1 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-75">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <div :id="'*_desc_spinner_'+uniqueIdentifier" class="hidden">
                                    <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full backdrop-blur-sm z-10 rounded-[10px] flex items-center justify-center">
                                        <span class="relative inset-0 inline-flex h-6 w-6 animate-spin items-center justify-center rounded-full border-2 border-gray-300 after:absolute after:h-8 after:w-8 after:rounded-full after:border-2 after:border-y-indigo-500 after:border-x-transparent"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="share-and-download">
                <collection-fork-and-like :page_title="info.name" />
            </div>
            <div class="main-container">
                <div class="post-body w-richtext">
                    <ol class="relative border-l ml-3 border-gray-200 dark:border-gray-700">
                        <collection-tree-structure
                            v-for="item in items"
                            :key="item.name + Math.random().toString(16).slice(2)"
                            :forlder="item"
                        />
                    </ol>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import VMdPreview from "@kangc/v-md-editor/lib/preview";
    import "@kangc/v-md-editor/lib/style/preview.css";

    // Introduce the theme you use. Take the github theme as an example here
    import githubTheme from "@kangc/v-md-editor/lib/theme/github";
    import "@kangc/v-md-editor/lib/theme/style/github.css";

    // Support Code copier
    import "@kangc/v-md-editor/lib/theme/style/github.css";
    import createCopyCodePlugin from "@kangc/v-md-editor/lib/plugins/copy-code/index";

    // Suport line number
    import "@kangc/v-md-editor/lib/plugins/copy-code/copy-code.css";
    import createLineNumbertPlugin from "@kangc/v-md-editor/lib/plugins/line-number/index";

    // Support Emoji
    import createEmojiPlugin from "@kangc/v-md-editor/lib/plugins/emoji/index";
    import "@kangc/v-md-editor/lib/plugins/emoji/emoji.css";

    // highlightjs
    import hljs from "highlight.js";
    import moment from "moment";

    VMdPreview.use(githubTheme, {
        Hljs: hljs,
        codeHighlightExtensionMap: { vue: "xml" },
    });

    VMdPreview.use(createCopyCodePlugin());
    VMdPreview.use(createLineNumbertPlugin());
    VMdPreview.use(createEmojiPlugin());

    Vue.use(VMdPreview);

    export default {
        props: {
            contents: {
                type: String,
                default: "### patienceman shared content loading",
            },
            collection: { required: true },
            author: { required: true },
        },
        computed: {
            authUser: {
                get() {
                    return JSON.parse(this.user);
                },
            },
            collector: {
                get() {
                    return JSON.parse(this.author);
                },
            },
            postCollection: {
                get() {
                    return JSON.parse(this.collection);
                },
            },
        },
        data: () => ({
            info: {},
            items: {},
            preparedCollection: {},
            isLoading: false,
            uniqueIdentifier: Math.random().toString(16).slice(2),
            data: {
                name: "",
                description: "",
                folderName: "",
                folderDescription: "",
                section:  "info.name"
            }
        }),
        methods: {
            async getCollections() {
                this.isLoading = true;
                this.collections = [];

                await this.inspectCollection(
                    this.postCollection.collection_url
                ).then((result) => this.preparedCollection = {...this.postCollection, file: result});

                this.isLoading = false;
            },

            async inspectCollection(path) {
                let result = fetch(`/storage/${path}`)
                    .then((response) => response.json())
                    .then((json) => json);

                return await result;
            },

            async createMarkDownFromCollection() {
                await this.getCollections();

                this.info = this.preparedCollection.file.info;
                this.items = this.preparedCollection.file.item;
                this.data.name = this.preparedCollection.file.info.name;
                this.data.description = this.preparedCollection.file.info.description;
                this.$root.$emit('load_collection', this.preparedCollection);
            },

            format(date) {
                return moment(date).format("MMMM Do YYYY");
            },

            // folder desc editor
            openEditor(forlderId) {
                document.getElementById('#'+forlderId).classList.remove('hidden');
                document.getElementById('*'+forlderId).classList.add('d-none');
            },

            closeEditor(forlderId) {
                document.getElementById('#'+forlderId).classList.add('hidden');
                document.getElementById('*'+forlderId).classList.remove('d-none');
            },

            async submitDocTitle() {
                let spinner = document.getElementById('*_title_spinner_'+this.uniqueIdentifier);

                this.$root.$emit('save_collection_changes', {
                    before: () => spinner.classList.remove('hidden'),

                    id: "title",
                    name: this.data.name,
                    section: "info.name",

                    after: () => {
                        spinner.classList.add('hidden');
                        this.$root.$emit('refresh_collection');
                    },
                });
            },

            async submitDocDesc() {
                let spinner = document.getElementById('*_desc_spinner_'+this.uniqueIdentifier);

                this.$root.$emit('save_collection_changes', {
                    before: () => spinner.classList.remove('hidden'),

                    id: "description",
                    description: this.data.description,
                    section: "info.description",

                    after: () => {
                        spinner.classList.add('hidden');
                        this.$root.$emit('refresh_collection');
                    },
                });
            }
        },
        mounted() {
            this.createMarkDownFromCollection();
            this.$root.$on('refresh_collection', () => this.createMarkDownFromCollection());
        },
    };
</script>
