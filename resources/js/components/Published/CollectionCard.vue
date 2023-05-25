<template>
    <article class="item is-loop is-image" key="doc.id">
        <div class="item-image global-image global-image-orientation global-radius is-landscape bg-gray-300">
            <a :href="'/documentation/'+preparedCollection.slug" class="global-link" :aria-label="collection_name"></a>
            <img src="https://images.unsplash.com/photo-1683349767621-21e880ef6bb1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                loading="lazy"
                :alt="collection_name"
                srcset="https://images.unsplash.com/photo-1683349767621-21e880ef6bb1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80 300w,
                        https://images.unsplash.com/photo-1683349767621-21e880ef6bb1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80 600w,
                        https://images.unsplash.com/photo-1683349767621-21e880ef6bb1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80 1200w'"
                sizes="(max-width:480px) 300px, (max-width:768px) 600px, 1200px">
        </div>

        <div class="flex items-center space-x-4 px-[2rem] mt-4">
            <img class="w-10 h-10 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" :src="collector.avatar" :alt="collector.name">
            <div class="font-medium dark:text-white">
                <div>{{ collector.name }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Published {{ format(preparedCollection.published_at) }}</div>
            </div>
        </div>

        <div class="item-content">
            <h4 class="item-title" style="margin-top: 1.3rem">
                <a :href="'/documentation/'+preparedCollection.slug" class="dark:text-gray-200">
                    {{ collection_name }}
                </a>
            </h4>
            <p class="item-excerpt dark:text-gray-200">{{ collection_desc }}</p>
        </div>
    </article>
</template>
<script>
    import moment from "moment";

    export default {
        props: {
            collection: { required: true },
            author: { required: true },
        },
        computed: {
            collector: {
                get() {
                    return JSON.parse(this.author);
                },
            },
            postCollection: {
                get() {
                    return JSON.parse(this.collection);
                },
            },
        },
        data: () => ({
            preparedCollection: {},
            collection_name: "",
            collection_desc: ""
        }),
        methods: {
            async getCollections() {
                this.collections = [];

                await this.inspectCollection(this.postCollection.collection_url)
                        .then((result) => this.preparedCollection = {...this.postCollection, file: result});

                this.collection_name = this.preparedCollection.file.info.name;
                this.collection_desc = this.preparedCollection.file.info.description;
            },

            async inspectCollection(path) {
                let result = fetch(`/storage/${path}`)
                    .then((response) => response.json())
                    .then((json) => json);

                return await result;
            },

            format(date) {
                return moment(date).fromNow();
            },
        },
        async mounted() {
            await this.getCollections();
        },
    };
</script>
