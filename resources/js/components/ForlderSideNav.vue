<template>
    <ul class="space-y-2 font-medium p-0 m-0">
        <li>
            <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                <div class="flex items-center space-x-4 mr-3">
                    <img class="w-10 h-10 rounded-full" :src="authUser.avatar" alt="">
                    <div class="font-medium dark:text-white truncate ... w-32">
                        <div class="text-left font-anek font-bold">{{ authUser.name }}</div>
                        <div class="text-sm text-left font-anek text-gray-500 dark:text-gray-400">Joined in {{ authUser.created_at }}</div>
                    </div>
                </div>
                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                <li class="cursor-pointer">
                    <input id="custom_file" type="file" @change="onFileChange" style="display: none">
                    <a @click="importFile" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white bg-indigo-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Import Collection</span>
                    </a>
                </li>
                <li class="cursor-pointer" v-for="collection in collections" :key="collection.id">
                    <a @click="loadCollection(collection.file)" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white bg-gray-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">
                            {{ collection.file.info.name }}
                        </span>
                    </a>
                </li>
                <div v-if="isLoading" class="flex justify-center items-center">
                    <span class="inline-flex h-6 w-6 animate-spin rounded-full border-4 border-dotted border-indigo-600"></span>
                </div>
            </ul>
        </li>

        <hr class="mt-4 mb-4">
        <h4 class="mx-2 font-anek mb-3 text-gray-400">{{ activeCollection }}</h4>
        <placeholder v-if="Object.keys(items).length <= 0" />
        <render-forlder v-for="item in items.item" :key="item.name+Math.random().toString(16).slice(2)" :forlder="item" />
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
        data(){
            return {
                items: {},
                collections: {},
                isLoading: false,
                activeCollection: "",
                data: {
                    collection: ""
                }
            };
        },
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
            importFile() {
                document.getElementById('custom_file').click();
            },
            /**
             * listern to inputfile change
             * and keep image in data handler
            */
            onFileChange(e) {
                this.data.collection = e.target.files[0];
                this.submitCollection();
            },

            /**
             * Store and publish custom blog
             * then redirect back to dashboard
            */
            async submitCollection() {
                this.isLoading = true;

                try{
                    let formData = new FormData;
                        formData.append('collection', this.data.collection);

                    let response = await axios.post("/api/collections", formData);

                    this.responseType = "success";
                    this.response = response.data.message;

                    this.getCollections();
                } catch(error) {
                    this.responseType = "error";
                    this.response = "something went wrong";
                }

                this.isLoading = false;
                this.hasResponse = true;
            },
            loadCollection(file) {
                this.items = file;
                this.activeCollection = file.info.name;
            },
            async inspectCollection(path) {
                let result = fetch(`/storage/${path}`)
                    .then((response) => response.json())
                    .then((json) => json );

                return await result;
            }
        },
        mounted() {
            this.getCollections();
        }
    }
</script>
