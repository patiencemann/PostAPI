<template>
    <div>
        <div>
            <label for="first_name" class="block mb-2 text-md font-anek text-gray-900 dark:text-white">Name</label>
            <input v-model="data.name" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Request name" required>
        </div>
        <div class="mt-3">
            <label for="message" class="block mb-2 text-md font-anek text-gray-900 dark:text-white">Description</label>
            <textarea v-model="data.description" id="message" rows="4" class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe your request..."></textarea>
        </div>
        <div class="mt-3" v-if="id">
            <button @click="submitRequestInfo" :class="(isLoading ? 'disabled' : '')+' relative cursor-pointer inline-flex h-10 w-32 items-center justify-center rounded-lg border border-transparent text-white bg-gray-800 hover:bg-gray-900 px-2 py-1 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-75'">
                <span>save changes</span>
            </button>
        </div>
        <div :class="!isLoading ? 'hidden' : ''">
            <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full backdrop-blur-sm z-10 rounded-[10px] flex items-center justify-center">
                <span class="relative inset-0 inline-flex h-6 w-6 animate-spin items-center justify-center rounded-full border-2 border-gray-300 after:absolute after:h-8 after:w-8 after:rounded-full after:border-2 after:border-y-indigo-500 after:border-x-transparent"></span>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ["name", "desc", "id"],
        data() {
            return {
                isLoading: false,
                responseType: null,
                response: null,
                data: {
                    id: this.id,
                    name: this.name,
                    description: this.desc,
                    section: "item"
                }
            }
        },
        methods: {
            async submitRequestInfo() {
                this.$root.$emit('save_collection_changes', {
                    data: this.data,
                    before: () => this.isLoading = true,
                    after: () => this.isLoading = false,
                });
            }
        },
        watch: {
            name: {
                handler(newName) {
                    this.data.name = newName;
                }, immediate: true
            },
            desc: {
                handler(newDesc) {
                    this.data.description = newDesc;
                }, immediate: true
            },
            id: {
                handler(newId) {
                    this.data.id = newId;
                }, immediate: true
            }
        },
    }
</script>
