<template>
    <div class="relative sm:invisible xs:invisible xl:visible sm:hidden xs:hidden xl:block">
        <div>
            <div style="padding-bottom: 583px"></div>
            <div class="opacity-100 border border-gray-100 rounded-lg bg-white px-3 py-2.5 shadow-md shadow-shadow-200" style="position: fixed; top: 25vh; left: 100px; width: 220px; transform: translateZ(0px);">
                <div class="sticky top-10 left-0">
                    <div class="pb-0 mt-6 hidden sm:block z-0">
                        <div class="relative w-full block z-10">
                            <div class="text-gray-900 text-base font-bold leading-22 bg-transparent">
                                About this Documentation
                            </div>
                        </div>
                        <div class="p-3 mt-2 relative transition-all border border-gray-100 rounded-[10px] duration-700 max-h-[20rem] overflow-y-auto false false">
                            <div class="TocListItems__Container-sc-1d5rso8-0 jXaJbH">
                                <ol class="overflow-hidden list-decimal list-inside pl-0 transition-all duration-700 align-top customized-scrollbar overflow-x-hidden overflow-y-auto marker:text-sm marker:leading-19 max-h-272">
                                    <li v-for="item in collection_items" :key="item.id" class="mb-3 last:mb-0 pr-1 text-sm leading-19">
                                        <a :href="'#'+item.name" class="cursor-pointer break-word text-sm leading-19">
                                            <span class="text-sm leading-19 break-word text-gray-5">
                                                {{ item.name }}
                                            </span>
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-x-4 mt-6 flex-wrap">
                        <div class="text-sm leading-21 text-gray-16 capitalize -tracking-tight w-full flex mb-3 font-bold">
                            Share This collection
                        </div>
                        <div class="flex flex-grow items-center gap-2">
                            <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button" class="flex text-gray-500 dark:bg-gray-700 dark:text-gray-400 bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                                </svg>
                            </button>
                            <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button" class="flex text-gray-500 dark:bg-gray-700 dark:text-gray-400 bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </button>
                            <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button" class="flex text-gray-500 dark:bg-gray-700 dark:text-gray-400 bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                                </svg>
                            </button>
                            <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button" class="flex text-gray-500 dark:bg-gray-700 dark:text-gray-400 bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75v6.75m0 0l-3-3m3 3l3-3m-8.25 6a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['collection_items']
    }
</script>
