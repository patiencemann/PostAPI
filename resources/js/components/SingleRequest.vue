<template>
    <div class="p-2 relative" style="width: 100%" v-if="isOpen">
        <div class="tabnet-content rounded-[10px] border overflow-y-auto border-gray-200 transition delay-150 duration-700 ease-in-out bg-white bg-clip-border shadow-3xl shadow-shadow-500 max-h-[78vh] p-2 mb-2 mt-1">
            <div class="request-input flex justify-start pt-4 px-4 pb-0">
                <div class="">
                    <select :value="request.request?.method !== undefined ? request.request.method : ''" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="GET" class="text-green-800">GET</option>
                        <option value="POST" class="text-indigo-800">POST</option>
                        <option value="DELETE" class="text-red-800">DELETE</option>
                        <option value="PUT" class="text-gray-800">PUT</option>
                    </select>
                </div>
                <div class="mb-6 w-96 ml-3">
                    <input :value="request.request?.url !== undefined ? (request.request.url?.raw !== undefined ? request.request.url.raw : '') : ''" type="text" id="success" class="bg-gray-50 border border-gray-500 text-gray-600 font-anek font-bold dark:text-green-400 placeholder-gray-400 dark:placeholder-green-500 text-md leading-3 rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.8 dark:bg-gray-700 dark:border-green-500" placeholder="https://api.example.com/api">
                </div>
            </div>

            <div class="mb-4 border-b border-t border-gray-200 py-2 dark:border-gray-700">
                <ul class="flex flex-wrap text-md font-bold font-anek text-left p-0 m-0" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="auth-tab" @click="openActiveTab('auth-content-tab')" data-tabs-target="#auth" type="button" role="tab" aria-controls="auth" aria-selected="false">
                            Auth
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block py-2 px-4 rounded" id="headers-tab" data-tabs-target="#headers" type="button" role="tab" @click="openActiveTab('headers-content-tab')" aria-controls="headers" aria-selected="false">
                            Headers
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-3 py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="body-tab" data-tabs-target="#body" @click="openActiveTab('body-content-tab')" type="button" role="tab" aria-controls="body" aria-selected="false">
                            Body
                        </button>
                    </li>
                    <li role="presentation">
                        <button class="inline-block py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="params-tab" data-tabs-target="#params" @click="openActiveTab('params-content-tab')" type="button" role="tab" aria-controls="params" aria-selected="false">
                            Params
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="Description-tab" data-tabs-target="#Description" @click="openActiveTab('description-content-tab')" type="button" role="tab" aria-controls="Description" aria-selected="true">
                            Description
                        </button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="auth-content-tab" role="tree-1-tabs" aria-labelledby="auth-tab">
                    <request-auth :auths="request.request?.auth !== undefined ? request.request.auth : {} " />
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="headers-content-tab" role="tree-1-tabs" aria-labelledby="headers-tab">
                    <request-headers :headers="request.request?.header !== undefined ? request.request.header : {} " />
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="body-content-tab" role="tree-1-tabs" aria-labelledby="body-tab">
                    <request-body :body="request.request?.body !== undefined ? request.request.body : {} " />
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="params-content-tab" role="tree-1-tabs" aria-labelledby="params-tab">
                    <request-params :param="request.request?.params !== undefined ? request.request.params : {} " />
                </div>
                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="description-content-tab" role="tree-1-tabs" aria-labelledby="Description-tab">
                    <request-description :name="request.name" :desc="request?.description !== undefined ? request.description : '' " :id="request.id" />
                </div>
            </div>

            <response-handler :response="request.response" />
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                request: {},
                isOpen: false
            }
        },
        methods: {
            openActiveTab(tabId) {
                document.querySelectorAll('[role="tree-1-tabs"]').forEach((Element) => {
                    Element.classList.add('hidden');
                });

                document.getElementById(tabId).classList.remove('hidden');
            }
        },
        mounted() {
            this.$root.$on('single_request', (request) => {
                this.isOpen = true
                this.request = {};
                this.request = request;
            });
        }
    }
</script>
