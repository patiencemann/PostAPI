<template>
    <div>
        <div>
            <label for="first_name" class="block mb-2 text-md font-anek text-gray-900 dark:text-white">Name</label>
            <input :value="name" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Request name" required>
        </div>
        <div class="mt-3">
            <label for="message" class="block mb-2 text-md font-anek text-gray-900 dark:text-white">Description</label>
            <textarea :value="desc" id="message" rows="4" class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe your request..."></textarea>
        </div>
        <button type="button" class="mt-3 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">save changes</button>
    </div>
</template>
<script>
    export default {
        props: ["name", "desc"],
    }
</script>
