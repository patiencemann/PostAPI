<template>
    <li v-if="!forlder.hasOwnProperty('request')">
        <a @click="parseRequests(forlder, 'dropdown-'+forlder.name+'-'+uniqueIdentifier)" class="border border-gray-200 mt-2 flex items-center cursor-pointer p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap truncate">{{ forlder.name }}</span>
            <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-50 bg-green-500 rounded-full dark:bg-gray-700 dark:text-gray-300">{{ forlder.item.length }}</span>
        </a>
        <ul v-if="forlder?.item" :id="'dropdown-'+forlder.name+'-'+uniqueIdentifier" class="hidden">
            <single-folder v-for="nextItem in forlder.item" :key="nextItem.name+Math.random().toString(16).slice(2)" :forlder="nextItem" />
        </ul>
    </li>
</template>
<script>
    export default {
        props: ["forlder"],
        data() {
            return {
                uniqueIdentifier: Math.random().toString(16).slice(2)
            }
        },
        methods: {
            parseRequests(forlder, nextGenId) {
                let requests = [];

                if(forlder.hasOwnProperty('request')){
                    this.$root.$emit('newRequests', forlder)
                }

                if(forlder.hasOwnProperty('item')){
                    if(document.getElementById(nextGenId).classList.contains('hidden')){
                        if(forlder.hasOwnProperty('item')){
                            document.getElementById(nextGenId).classList.remove('hidden');
                        }
                    } else {
                        document.getElementById(nextGenId).classList.add('hidden');
                    }
                }

                for (var key in forlder.item) {
                    if (forlder.item[key].hasOwnProperty('request')) {
                        requests.push(forlder.item[key]);
                    }
                }

                this.$root.$emit('newRequests', requests);
            },
        }
    }
</script>
