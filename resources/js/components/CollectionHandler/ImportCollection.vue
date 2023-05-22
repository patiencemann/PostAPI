<template>
    <li class="cursor-pointer">
        <input
            id="custom_file"
            type="file"
            @change="onFileChange"
            style="display: none"
        />
        <a @click="importFile" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white bg-indigo-100 dark:hover:bg-gray-700">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"
                />
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Import Collection</span>
        </a>
    </li>
</template>
<script>
export default {
    data() {
        return {
            newCollection: {},
            data: {
                collection: "",
            },
        };
    },
    methods: {
        importFile() {
            document.getElementById("custom_file").click();
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

            try {
                let formData = new FormData();
                formData.append("collection", this.data.collection);

                let response = await axios.post("/api/collections", formData);

                this.responseType = "success";
                this.response = response.data.message;
                let data = response.data.data;

                this.collectionStamper(data.id, data.collection_url);
            } catch (error) {
                this.responseType = "error";
                this.response = "something went wrong";
            }

            this.isLoading = false;
            this.hasResponse = true;
        },

        async collectionStamper(collectionId, path) {
            await this.inspectCollection(path).then((result) => {
                this.newCollection["info"] = result.info;
                this.newCollection["event"] = result.event;
                this.newCollection["auth"] = result.auth;

                const items = this.recursiveMap(result.item, (val) => ({
                    ...val,
                    id: Math.random().toString(16).slice(2),
                    description: val?.description ? val.description : "",
                }));

                // then write file
                this.newCollection["item"] = items;
            });

            this.respostCollection(collectionId, this.newCollection);
        },

        recursiveMap(obj, callback) {
            obj.forEach((value, key, array) => {
                // If the value is an object, recursively call the function with that object as the new argument
                if (value.hasOwnProperty("item")) {
                    if (typeof value.item === "object") {
                        obj[key] = {
                            name: value.name,
                            id: Math.random().toString(16).slice(2),
                            item: this.recursiveMap(value.item, callback),
                            description: value?.description
                                ? value.description
                                : "",
                        };
                    }
                } else {
                    obj[key] = callback(value);
                }
            });

            return obj;
        },

        respostCollection(collectionId, newCollection) {
            axios.post(`/api/repost/collections/${collectionId}`, {
                    new_collection_contents: newCollection,
                })
                .then((response) => {
                    this.responseType = "success";
                    this.response = response.data.message;
                });
        },

        async inspectCollection(path) {
            let result = fetch(`/storage/${path}`)
                .then((response) => response.json())
                .then((json) => json);

            return await result;
        },
    },
};
</script>
