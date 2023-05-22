<template>
    <div>
        <div class="mb-4 border-b border-gray-200 pb-2 dark:border-gray-700">
            <ul class="flex flex-wrap text-md font-bold font-anek text-left p-0 m-0" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" @click="openActiveTab('form-data-body-content-tab')" id="form-data-tab" data-tabs-target="#form-data" type="button" role="tab" aria-controls="form-data" aria-selected="true">
                        Form-data
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block py-2 px-4 rounded" id="raw-data-tab" @click="openActiveTab('raw-data-body-content-tab')" data-tabs-target="#raw-data" type="button" role="tab" aria-controls="raw-data" aria-selected="false">
                        Raw
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-3 py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" @click="openActiveTab('URL-Encoded-body-content-tab')" id="URL-Encoded-tab" data-tabs-target="#URL-Encoded" type="button" role="tab" aria-controls="URL-Encoded" aria-selected="false">
                        Form URL-Encoded
                    </button>
                </li>
                <li role="presentation">
                    <button class="inline-block py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="Binary-tab" @click="openActiveTab('Binary-body-content-tab')" data-tabs-target="#Binary" type="button" role="tab" aria-controls="Binary" aria-selected="false">
                        Binary
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block py-2 px-4 rounded hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="GraphQL-tab" data-tabs-target="#GraphQL" @click="openActiveTab('GraphQL-body-content-tab')" type="button" role="tab" aria-controls="GraphQL" aria-selected="false">
                        GraphQL
                    </button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800" id="form-data-body-content-tab" role="tree-3-tabs" aria-labelledby="form-data-tab">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Key</th>
                                <th scope="col" class="px-6 py-3">Value</th>
                                <th scope="col" class="px-6 py-3">Type</th>
                                <th scope="col" class="px-6 py-3">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="formdata in body.formdata" :key="formdata.key+Math.random().toString(16).slice(2)" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ formdata?.key ? formdata.key : '' }}
                                </th>
                                <td class="px-6 py-4 w-32" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden !important;">{{ formdata.type == 'file' ? (formdata?.src ? formdata.src : '') : (formdata?.value ? formdata.value : '') }}</td>
                                <td class="px-6 py-4">{{ formdata?.type ? formdata.type : '' }}</td>
                                <td class="px-6 py-4 text-right">{{ formdata?.description ? formdata.description : 'No description' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="raw-data-body-content-tab" role="tree-3-tabs" aria-labelledby="raw-data-tab">
                <div><textarea :value="body?.raw !== undefined ? body.raw : {}" id="message" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{}"></textarea></div>
            </div>
            <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="URL-Encoded-body-content-tab" role="tree-3-tabs" aria-labelledby="URL-Encoded-tab">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Key</th>
                                <th scope="col" class="px-6 py-3">Value</th>
                                <th scope="col" class="px-6 py-3">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="formdata in body.formdata" :key="formdata.key+Math.random().toString(16).slice(2)" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ formdata?.key ? formdata.key : '' }}
                                </th>
                                <td class="px-6 py-4 w-32" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden !important;">
                                    {{ formdata?.value ? formdata.value : '' }}
                                </td>
                                <td class="px-6 py-4 text-right">{{ formdata?.description ? formdata.description : 'No description' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="Binary-body-content-tab" role="tree-3-tabs" aria-labelledby="Binary-tab">
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="GraphQL-body-content-tab" role="tree-3-tabs" aria-labelledby="GraphQL-tab">
                <div><textarea :value="body?.raw !== undefined ? body.raw : {}" id="message" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{}"></textarea></div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ["body"],
        methods: {
            openActiveTab(tabId) {
                document.querySelectorAll('[role="tree-3-tabs"]').forEach((Element) => {
                    Element.classList.add('hidden');
                });

                document.getElementById(tabId).classList.remove('hidden');
            }
        }
    }
</script>
