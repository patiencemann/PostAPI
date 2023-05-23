<template>

</template>
<script>
    export default {
        data(){
            return {
                collection: null
            }
        },
        methods: {
            async submitCollectionChanges(collectionId, data) {
                this.isLoading = true;

                try {
                    let formData = new FormData();
                        formData.append("id", data.id);
                        formData.append("changes", JSON.stringify(data));
                        formData.append("section", data.section);

                    let response = await axios.post(`/api/update/collections/${collectionId}`, formData);

                    this.$root.$emit('new_message', {
                        responseType: "success",
                        response: response.data.message,
                        hasResponse: true
                    });

                } catch (error) {
                    this.$root.$emit('new_message', {
                        responseType: "error",
                        response: "Something went wrong",
                        hasResponse: true
                    });
                }

                this.isLoading = false;
            }
        },
        mounted() {
            this.$root.$on('load_collection', (collection) => {
                this.collection = collection;
            });

            this.$root.$on('save_collection_changes', (payload) => {
                this.submitCollectionChanges(this.collection.id, payload);
            });
        }
    }
</script>
scrip
