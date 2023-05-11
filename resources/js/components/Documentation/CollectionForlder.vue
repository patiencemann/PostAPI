<template>
    <div>
        <li class="mb-10 ml-6" v-if="!forlder.hasOwnProperty('request')">
            <span class="absolute flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                </svg>
            </span>
            <h3 class="flex items-center mb-1 font-semibold text-gray-900 dark:text-white capitalize">{{ forlder.name }}
                <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ml-3">{{ forlder.hasOwnProperty('request') ? "Request" : "Forlder" }}</span>
            </h3>
            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on January 13th, 2022</time>

            <ol v-if="forlder?.item" class="relative border-l mt-3 border-gray-200 dark:border-gray-700">
                <collection-forlder v-for="nextItem in forlder.item" :key="nextItem.name+uniqueIdentifier" :forlder="nextItem" />
            </ol>
        </li>
        <li class="mb-10 ml-6 pr-3" v-if="forlder.hasOwnProperty('request')">
            <span :class="methodsSymbols[forlder.request.method]+' absolute flex items-center justify-center w-8 h-8 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
            </span>
            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white capitalize">
                <span :class="methodsSymbols[forlder.request.method]+' text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300'">
                    {{ forlder.request?.method !== undefined ? forlder.request?.method : '' }}
                </span>
                {{ forlder.name }}
            </h3>

            <div class="py-2 px-3 mt-3 text-sm ring-2 ring-gray-200 text-gray-500 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300">
                {{ forlder.request.url?.raw !== undefined ? forlder.request.url.raw : '' }}
            </div>

            <!-- Authentication -->
            <div class="relative overflow-x-auto mt-3 pt-3 ring-2 ring-gray-200 sm:rounded-lg" v-if="forlder.request?.auth !== undefined">
                <span class="px-3 py-2 text-md font-bold text-left text-gray-500 bg-white dark:text-white dark:bg-gray-800">Authorization</span>
                <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

                <div class="text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <caption class="px-3 py-2 text-md font-bold text-left text-gray-500 bg-white dark:text-white dark:bg-gray-800">
                            Request Auth | <span>{{ forlder.request.auth.type }}</span>
                        </caption>
                        <tbody>
                            <tr v-for="auth in forlder.request.auth.bearer" :key="auth.type" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-3 py-2">
                                    {{ auth.value }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Request Headers -->
            <div class="relative overflow-x-auto mt-3 pt-3 ring-2 ring-gray-200 sm:rounded-lg" v-if="forlder.request.header.length > 0">
                <span class="px-3 py-2 text-md font-bold text-left text-gray-500 bg-white dark:text-white dark:bg-gray-800">
                    Headers
                </span>
                <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <caption class="px-3 py-2 text-md font-bold text-left text-gray-500 bg-white dark:text-white dark:bg-gray-800">
                        Request Headers
                    </caption>
                    <tbody>
                        <tr v-for="head in forlder.request.header" :key="head.key" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ head.key }}
                            </th>
                            <td class="px-3 py-2">
                                {{ head.value }}
                            </td>
                            <td class="px-3 py-2">
                                {{ head.type }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Request Body -->
            <div v-if="forlder.request?.body !== undefined" class="w-full mb-4 mt-3 ring-2 ring-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                <div class="flex items-center justify-between px-3 border-b dark:border-gray-600">
                    <div class="flex pt-2 flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600">
                        <div class="flex items-center space-x-1 sm:pr-4">
                            <button type="button" class="text-md text-gray-500 p-2 font-anek font-bold rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <span class="text-md">Request Body</span>
                            </button>
                        </div>
                        <div class="flex flex-wrap items-center space-x-1 sm:pl-4">
                            <button type="button" class="text-gray-500 p-2 text-md font-anek font-bold rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <span class="text-md">
                                    {{forlder.request.body.mode}}
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800 overflow-x-auto">
                    <label for="editor" class="sr-only">Publish post</label>

                    <textarea v-if="forlder.request.body?.raw !== undefined" id="editor" :value="forlder.request.body.raw" disabled rows="8" class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write an article..." required></textarea>

                    <table v-if="forlder.request.body?.formdata !== undefined" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-scroll">
                        <tbody>
                            <tr v-for="formData in forlder.request.body.formdata" :key="formData.key" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ formData.key }}
                                </th>
                                <td class="px-3 py-2">
                                    {{ formData.value }}
                                </td>
                                <td class="px-3 py-2">
                                    {{ formData.type }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </li>
    </div>
</template>
<script>
    export default {
        props: ["forlder"],
        data() {
            return {
                uniqueIdentifier: Math.random().toString(16).slice(2),
                methodsSymbols: {
                    POST: "bg-indigo-200",
                    GET: "bg-green-200",
                    PUT: "bg-gray-200",
                    DELETE: "bg-red-200",
                },
            }
        },
    }
</script>
