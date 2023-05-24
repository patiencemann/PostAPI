<template>
    <ul class="space-y-2 font-medium p-0 m-0 relative">
        <li>
            <button type="button" class="border border-gray-200 flex rounded-[10px] bg-clip-border shadow-3xl shadow-shadow-500 items-center w-full p-2 text-gray-900 transition duration-75 group bg-[#f5f7fe] dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                <div class="flex items-center space-x-4 mr-3">
                    <img class="w-10 h-10 rounded-full" :src="authUser.avatar" alt="">
                    <div class="font-medium dark:text-white truncate ... w-32">
                        <div class="text-left font-anek font-bold">{{ authUser.name }}</div>
                        <div class="text-sm text-left font-anek text-gray-500 dark:text-gray-400 truncate">Joined in {{ authUser.created_at }}</div>
                    </div>
                </div>
                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <ul id="dropdown-example" class="hidden p-0 m-0 mt-2 transition delay-150 duration-700 ease-in-out">

                <import-collection />

                <div class="border border-gray-200 rounded-[10px] bg-clip-border bg-[#f5f7fe] shadow-3xl shadow-shadow-500 p-2 mt-2 overflow-y-auto max-h-48">
                    <ul class="p-0 m-0">
                        <li class="cursor-pointer mb-2" v-for="collection in collections" :key="collection.id">
                            <a @click="loadCollection(collection)" class="border border-gray-200 flex items-center p-2 text-gray-900 rounded-lg dark:text-white bg-gray-50 dark:hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                                </svg>
                                <span class="flex-1 ml-3 truncate">
                                    {{ collection.file.info.name }}
                                </span>
                            </a>
                        </li>
                    </ul>

                    <div v-if="isLoading" class="flex justify-center items-center">
                        <span class="inline-flex h-6 w-6 animate-spin rounded-full border-4 border-dotted border-indigo-600"></span>
                    </div>
                </div>
            </ul>
        </li>

        <div class="active-collection relative h-10 min-h-20 mt-4">
            <h4 class="mx-2 font-anek mb-3 text-gray-400 truncate">
                {{ activeFile.name }}
            </h4>

            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex ring-1 ring-gray-50 absolute shadow-sm right-0 -top-2 items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul v-if="Object.keys(items).length > 0" class="p-0 m-0 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                    <li><a :href="'/documentation/'+activeCollection.slug" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        View documentation
                    </a></li>
                </ul>
                <div v-if="Object.keys(items).length > 0" class="py-2">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-100 dark:hover:bg-red-600 dark:text-red-200 dark:hover:text-white">
                        Delete
                    </a>
                </div>
            </div>
        </div>

        <placeholder v-if="Object.keys(items).length <= 0" />

        <single-folder v-for="item in items.item" :key="item.name+Math.random().toString(16).slice(2)" :forlder="item" />
    </ul>
</template>
<script>
    export default {
        props: {
            user: { required: true },
        },
        computed: {
            authUser: {
                get() {
                    return JSON.parse(this.user);
                },
            },
        },
        data: () => ({
            items: {},
            collections: {},
            isLoading: false,
            responseType: null,
            response: null,
            activeCollection: "",
            activeFile: "",
        }),
        methods: {
            async getCollections() {
                this.isLoading = true;
                this.collections = [];

                let response = await axios.get(`/api/collections`);

                await response.data.data.map(async (value) => {
                    await this.inspectCollection(value.collection_url).then((result) => {
                        this.collections.push({ ...value, file: result });
                    });
                });

                this.isLoading = false;
            },

            loadCollection(collection) {
                this.items = collection.file;
                this.activeCollection = collection;
                this.activeFile = collection.file.info;

                this.passInitialUnFoldedRequest();
                this.$root.$emit('load_collection', collection);
            },

            async inspectCollection(path) {
                let result = fetch(`/storage/${path}`)
                    .then((response) => response.json())
                    .then((json) => json );

                return await result;
            },

            passInitialUnFoldedRequest() {
                let requests = [];

                for (var key in this.items.item) {
                    if (this.items.item[key].hasOwnProperty('request')) {
                        requests.push(this.items.item[key]);
                    }
                }

                (requests.length > 0)
                    ? this.$root.$emit('newRequests', requests)
                    : this.$root.$emit('newRequests', null)
            },
        },
        mounted() {
            this.getCollections();

            this.$root.$on('refresh_collections', async (collection_url) => {
                this.getCollections();

                await this.inspectCollection(collection_url).then((result) => {
                    this.items = result;
                    this.activeCollection = result;
                    this.activeFile = result.info;
                });
            });
        }
    }
</script>
