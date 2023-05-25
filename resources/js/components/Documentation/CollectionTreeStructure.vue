<template>
    <div>
        <!--
            ----------------------------------------
            WHEN IT IS FOLDER TURN
            ----------------------------------------
         -->
        <li class="mb-10 ml-6" v-if="!forlder.hasOwnProperty('request')" :id="forlder.name">
            <span class="absolute p-2 flex items-center justify-center w-8 h-8 bg-blue-400 text-center text-gray-200 rounded-full -left-3 ring-4 ring-[#ecf1fa] dark:ring-gray-900 dark:bg-blue-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                </svg>
            </span>
            <div class="relative">
                <h3 class="flex  items-center mb-1 font-semibold text-gray-900 dark:text-white capitalize">{{ forlder.name }}
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ml-3">{{ forlder.hasOwnProperty('request') ? "Request" : "Forlder" }}</span>
                    <div v-if="owner" @click="openForlderTitleEditor(uniqueIdentifier)" :id="'*_title_'+uniqueIdentifier" class="editBtn border border-gray-200 ml-2 bg-gray-100 rounded-circle w-8 h-8 flex items-center justify-center text-gray-500 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                    </div>
                    <div v-if="owner" @click="openDescEditor(uniqueIdentifier)" :id="'*_desc_'+uniqueIdentifier" class="editBtn border border-gray-200 ml-2 bg-gray-100 rounded-circle w-8 h-8 flex items-center justify-center text-gray-500 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                    </div>
                </h3>
                <div class="hidden" :id="'#_title_'+uniqueIdentifier">
                    <div class="absolute -bottom-16 z-10 flex w-auto border border-gray-100 flex-grow items-center justify-center rounded-[10px] bg-white px-3 py-2.5 shadow-md shadow-shadow-200 dark:!bg-navy-800 dark:shadow-none md:w-[365px] md:flex-grow-0 md:gap-1 xl:w-[365px] xl:gap-2">
                        <div>
                            <input :value="forlder.name" type="text" :id="'#v-model_name_'+uniqueIdentifier" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title..">
                        </div>
                        <div>
                            <button @click="submitDocFolderName(forlder.id, uniqueIdentifier)" class="relative cursor-pointer inline-flex h-10 w-20 items-center justify-center rounded-lg border border-transparent text-white bg-gray-800 hover:bg-gray-900 px-2 py-1 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-75">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                </svg>
                            </button>
                        </div>
                        <div>
                            <button @click="closeForlderTitleEditor(uniqueIdentifier)" class="relative cursor-pointer inline-flex h-10 w-20 items-center justify-center rounded-lg border border-transparent text-white bg-gray-400 hover:bg-gray-900 px-2 py-1 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-75">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div :id="'*_foldername_spinner_'+uniqueIdentifier" class="hidden">
                            <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full backdrop-blur-sm z-10 rounded-[10px] flex items-center justify-center">
                                <span class="relative inset-0 inline-flex h-6 w-6 animate-spin items-center justify-center rounded-full border-2 border-gray-300 after:absolute after:h-8 after:w-8 after:rounded-full after:border-2 after:border-y-indigo-500 after:border-x-transparent"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on January 13th, 2022</time>

            <div class="editableFolder">
                <p class="font-anek font-medium text-gray-600">{{ forlder.description }}</p>
                <div :id="'#_desc_'+uniqueIdentifier" class="hidden relative w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea :value="forlder.description" :id="'#v-model_desc_'+uniqueIdentifier" rows="2" class="font-anek font-medium text-gray-600 w-full px-0 text-sm bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                        <button @click="submitDocFolderDescription(forlder.id, uniqueIdentifier)" type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Save changes
                        </button>
                        <button @click="closeDescEditor(uniqueIdentifier)" type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-gray-500 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Cancel
                        </button>
                    </div>
                    <div :id="'*_folderdesc_spinner_'+uniqueIdentifier" class="hidden">
                        <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full backdrop-blur-sm z-10 rounded-[10px] flex items-center justify-center">
                            <span class="relative inset-0 inline-flex h-6 w-6 animate-spin items-center justify-center rounded-full border-2 border-gray-300 after:absolute after:h-8 after:w-8 after:rounded-full after:border-2 after:border-y-indigo-500 after:border-x-transparent"></span>
                        </div>
                    </div>
                </div>
            </div>

            <ol v-if="forlder?.item" class="relative border-l mt-3 border-gray-200 dark:border-gray-700">
                <collection-tree-structure v-for="nextItem in forlder.item" :key="nextItem.name+uniqueIdentifier" :forlder="nextItem" :owner="owner" />
            </ol>
        </li>

        <!--
            ----------------------------------------
            WHEN IT IS REQUEST TURN
            ----------------------------------------
         -->
        <li class="mb-10 ml-6 pr-3" v-if="forlder.hasOwnProperty('request')">
            <span :class="methodsSymbols[forlder.request.method]+' absolute flex items-center justify-center w-8 h-8 rounded-full -left-3 ring-4 p-2 ring-[#ecf1fa] dark:ring-gray-900 dark:bg-blue-900'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
            </span>
            <div class=relative>
                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white capitalize">
                    <span :class="methodsSymbols[forlder.request.method]+' text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300'">
                        {{ forlder.request?.method !== undefined ? forlder.request?.method : '' }}
                    </span>
                    {{ forlder.name }}
                    <div v-if="owner" @click="openForlderTitleEditor(uniqueIdentifier)" :id="'*_title_'+uniqueIdentifier" class="editBtn border border-gray-200 ml-2 bg-gray-100 rounded-circle w-8 h-8 flex items-center justify-center text-gray-500 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                          </svg>
                    </div>
                    <div v-if="owner" @click="openDescEditor(uniqueIdentifier)" :id="'*_desc_'+uniqueIdentifier" class="editBtn border border-gray-200 ml-2 bg-gray-100 rounded-circle w-8 h-8 flex items-center justify-center text-gray-500 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                    </div>
                </h3>
                <div class="hidden" :id="'#_title_'+uniqueIdentifier">
                    <div class="absolute -bottom-16 z-10 flex w-auto border border-gray-100 flex-grow items-center justify-center rounded-[10px] bg-white px-3 py-2.5 shadow-md shadow-shadow-200 dark:!bg-navy-800 dark:shadow-none md:w-[365px] md:flex-grow-0 md:gap-1 xl:w-[365px] xl:gap-2">
                        <div>
                            <input :value="forlder.name" type="text" :id="'#v-model_name_'+uniqueIdentifier" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title..">
                        </div>
                        <div>
                            <button @click="submitDocFolderName(forlder.id, uniqueIdentifier)" class="relative cursor-pointer inline-flex h-10 w-20 items-center justify-center rounded-lg border border-transparent text-white bg-gray-800 hover:bg-gray-900 px-2 py-1 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-75">
                                <span v-if="isLoading" class="absolute top-0 right-0 left-0 bottom-0 w-full flex justify-center items-center bg-gray-600 rounded-lg">
                                    <div class="inline-flex items-center gap-px">
                                        <span class="animate-blink mx-px h-1.5 w-1.5 rounded-full bg-white"></span>
                                        <span class="animate-blink animation-delay-150 mx-px h-1.5 w-1.5 rounded-full bg-white"></span>
                                        <span class="animate-blink animation-delay-300 mx-px h-1.5 w-1.5 rounded-full bg-white"></span>
                                    </div>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                </svg>
                            </button>
                        </div>
                        <div>
                            <button @click="closeForlderTitleEditor(uniqueIdentifier)" class="relative cursor-pointer inline-flex h-10 w-20 items-center justify-center rounded-lg border border-transparent text-white bg-gray-400 hover:bg-gray-900 px-2 py-1 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-75">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div :id="'*_foldername_spinner_'+uniqueIdentifier" class="hidden">
                            <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full backdrop-blur-sm z-10 rounded-[10px] flex items-center justify-center">
                                <span class="relative inset-0 inline-flex h-6 w-6 animate-spin items-center justify-center rounded-full border-2 border-gray-300 after:absolute after:h-8 after:w-8 after:rounded-full after:border-2 after:border-y-indigo-500 after:border-x-transparent"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="editableFolder">
                <p class="font-anek font-medium text-gray-600">{{ forlder.description }}</p>
                <div :id="'#_desc_'+uniqueIdentifier" class="hidden relative w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea :value="forlder.description" :id="'#v-model_desc_'+uniqueIdentifier" rows="2" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                        <button @click="submitDocFolderDescription(forlder.id, uniqueIdentifier)" type="button" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Save changes
                        </button>
                        <button @click="closeDescEditor(uniqueIdentifier)" type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-gray-500 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Cancel
                        </button>
                    </div>
                    <div :id="'*_folderdesc_spinner_'+uniqueIdentifier" class="hidden">
                        <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full backdrop-blur-sm z-10 rounded-[10px] flex items-center justify-center">
                            <span class="relative inset-0 inline-flex h-6 w-6 animate-spin items-center justify-center rounded-full border-2 border-gray-300 after:absolute after:h-8 after:w-8 after:rounded-full after:border-2 after:border-y-indigo-500 after:border-x-transparent"></span>
                        </div>
                    </div>
                </div>
            </div>

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

                    <textarea v-if="forlder.request.body?.raw !== undefined" id="editor" :value="forlder.request.body.raw" disabled rows="8" class="block font-medium leading-7 text-gray-500 w-full px-0 text-[17px] bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write an article..." required></textarea>

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
        props: ["forlder", "owner"],
        data() {
            return {
                isLoading: false,
                uniqueIdentifier: Math.random().toString(16).slice(2),
                methodsSymbols: {
                    POST: "bg-indigo-400 text-gray-50",
                    GET: "bg-green-400 text-gray-50",
                    PUT: "bg-gray-400 text-gray-50",
                    DELETE: "bg-red-400 text-gray-50",
                },
            }
        },
        methods: {
            // folder desc editor
            openDescEditor(forlderId) {
                document.getElementById('#_desc_'+forlderId).classList.remove('hidden');
                document.getElementById('*_desc_'+forlderId).classList.add('d-none');
            },

            closeDescEditor(forlderId) {
                document.getElementById('#_desc_'+forlderId).classList.add('hidden');
                document.getElementById('*_desc_'+forlderId).classList.remove('d-none');
            },

            // forlder title editor
            openForlderTitleEditor(forlderId) {
                document.getElementById('#_title_'+forlderId).classList.remove('hidden');
                document.getElementById('*_title_'+forlderId).classList.add('d-none');
            },

            closeForlderTitleEditor(forlderId) {
                document.getElementById('#_title_'+forlderId).classList.add('hidden');
                document.getElementById('*_title_'+forlderId).classList.remove('d-none');
            },

            async submitDocFolderName(folderId, identifier) {
                let folderModel = document.getElementById('#v-model_name_'+identifier).value;
                let spinner = document.getElementById('*_foldername_spinner_'+identifier);

                this.$root.$emit('save_collection_changes', {
                    before: () => spinner.classList.remove('hidden'),
                    data: {
                        id: folderId,
                        name: folderModel,
                        section: "item",
                    },
                    after: () => {
                        spinner.classList.add('hidden');
                        this.$root.$emit('refresh_collection');
                    },
                });
            },

            async submitDocFolderDescription(folderId, identifier) {
                let folderModel = document.getElementById('#v-model_desc_'+identifier).value;
                let spinner = document.getElementById('*_folderdesc_spinner_'+identifier);

                this.$root.$emit('save_collection_changes', {
                    before: () => spinner.classList.remove('hidden'),
                    data: {
                        id: folderId,
                        description: folderModel,
                        section: "item",
                    },
                    after: () => {
                        spinner.classList.add('hidden');
                        this.$root.$emit('refresh_collection');
                    },
                });
            }
        }
    }
</script>
