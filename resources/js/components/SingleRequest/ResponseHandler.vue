<template>
    <div v-if="Object.keys(response).length > 0" class="mt-4 border-b border-gray-200 py-2 dark:border-gray-700">
        <div class="mb-4 border-b border-t border-gray-200 py-2 dark:border-gray-700">
            <ul class="flex flex-wrap text-md font-bold font-anek text-left p-0 m-0" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="request-tab" data-tabs-target="#request" type="button" role="tab" aria-controls="request" aria-selected="true">
                        Request
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block py-2 px-4 rounded" id="response-tab" data-tabs-target="#response" type="button" role="tab" aria-controls="response" aria-selected="false">
                        Response
                    </button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="request" role="tabpanel" aria-labelledby="request-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="response" role="tabpanel" aria-labelledby="response-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                response: {},
            }
        },
        mounted() {
            this.$root.$on('response_handler', (response) => {
                this.response = {};
                this.response = response;
            });
        }
    }
</script>
