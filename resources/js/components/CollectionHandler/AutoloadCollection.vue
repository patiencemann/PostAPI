<template>

</template>
<script>
    export default {
        data: () => ({
            urlParams: new URLSearchParams(window.location.search)
        }),
        methods: {
            async loadCollection() {
                if(this.urlParams.has('collection')) {
                    let response = await axios.get(`/api/collections/${this.urlParams.get('collection')}`);

                    this.$root.$emit('autoload_collection', {
                        before: () => this.$root.$emit('set_loader_on'),

                        collection: response.data.data,

                        after: () => {
                            if(this.urlParams.has('requests')) {
                                document.getElementById(this.urlParams.get('requests')).click();
                            }

                            this.$root.$emit('set_loader_off');
                        }
                    });
                }
            },
        },
        async mounted() {
            this.loadCollection();
        }
    }
</script>
