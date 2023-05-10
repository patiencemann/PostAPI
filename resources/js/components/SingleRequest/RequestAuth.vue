<template>
    <div>
        <div class="mb-4 border-b border-gray-200 pb-2 dark:border-gray-700">
            <ul class="flex flex-wrap text-md font-bold font-anek text-left p-0 m-0" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="none-auth-tab" data-tabs-target="#none-auth" type="button" role="tab" aria-controls="none-auth" aria-selected="true">
                        None
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block py-2 px-4 rounded" id="basic-auth-tab" data-tabs-target="#basic-auth" type="button" role="tab" aria-controls="basic-auth" aria-selected="false">
                        Basic Auth
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-3 py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="bearer-auth-tab" data-tabs-target="#bearer-auth" type="button" role="tab" aria-controls="bearer-auth" aria-selected="false">
                        Bearer Token
                    </button>
                </li>
                <li role="presentation">
                    <button class="inline-block py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="oauth1-auth-tab" data-tabs-target="#oauth1-auth" type="button" role="tab" aria-controls="oauth1-auth" aria-selected="false">
                        OAuth 1
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="oauth2-auth-tab" data-tabs-target="#oauth2-auth" type="button" role="tab" aria-controls="oauth2-auth" aria-selected="false">
                        OAuth 2
                    </button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="none-auth" role="tabpanel" aria-labelledby="none-auth-tab">
                <span class="text-gray-300">No authorization was set for this request.</span>
            </div>
            <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="basic-auth" role="tabpanel" aria-labelledby="basic-auth-tab">
                Basic Auth
            </div>
            <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="bearer-auth" role="tabpanel" aria-labelledby="bearer-auth-tab">
                Bearer Token
            </div>
            <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="oauth1-auth" role="tabpanel" aria-labelledby="oauth1-auth-tab">
                OAuth 1
            </div>
            <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="oauth2-auth" role="tabpanel" aria-labelledby="oauth2-auth-tab">
                OAuth 2
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ["auth"],
    }
</script>
