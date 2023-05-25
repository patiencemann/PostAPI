<template>
    <aside v-if="requests !== null" style="width: 100%" class="top-0 left-0 z-40 p-2 h-[80vh] mb-2 mt-1 transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto dark:bg-gray-800 rounded-[10px] border border-gray-200 transition delay-150 duration-700 ease-in-out bg-white bg-clip-border shadow-3xl shadow-shadow-500">
            <ul class="space-y-2 font-medium p-0 m-0 cursor-pointer" v-if="requests">
                <li v-for="request in requests" :key="request.name+Math.random().toString(16).slice(2)">
                    <a @click="viewRequest(request)" class="border border-gray-200 flex items-center justify-between p-2 text-gray-900 rounded-[10px] bg-clip-border shadow-3xl shadow-shadow-500 dark:text-white bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <div class="text-left ml-2 w-40 overflow-hidden">
                                <div class="text-left truncate">{{ request.name }}</div>
                                <div class="text-sm text-left text-gray-500 truncate">{{ request.request.url.raw }}</div>
                            </div>
                        </div>
                        <span :class="methodsSymbols[request.request.method]+` inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-50 rounded-full dark:bg-gray-700 dark:text-gray-300`">
                            {{ request.request.method }}
                        </span>
                    </a>
                </li>
            </ul>

            <placeholder v-if="Object.keys(requests).length <= 0" />

            <div v-if="isLoading">
                <span class="inline-flex h-6 w-6 animate-spin rounded-full border-4 border-dotted border-indigo-600"></span>
            </div>
        </div>
    </aside>
</template>
<script>
    export default {
        data(){
            return {
                requests: null,
                methodsSymbols: {
                    POST: "bg-indigo-500",
                    GET: "bg-green-500",
                    PUT: "bg-gray-500",
                    DELETE: "bg-red-500",
                },
                isLoading: false
            }
        },
        methods:{
            viewRequest(request) {
                this.$root.$emit('single_request', request);
            }
        },
        mounted() {
            this.$root.$on('newRequests', (requests) => {
                this.isLoading = true;
                this.requests = {};
                this.requests = requests;
                this.isLoading = false;
            });
        }
    }
</script>
