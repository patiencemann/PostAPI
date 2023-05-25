<template>
    <div v-if="isLoading">
        <div class="fixed animated-loader fade-in bg-gray-50 top-0 right-0 bottom-0 left-0 z-20 w-full h-full backdrop-blur-sm rounded-[10px] flex items-center justify-center">
            <span class="relative inset-0 inline-flex h-16 w-16 animate-spin items-center justify-center rounded-full border-2 border-gray-300 after:absolute after:h-20 after:w-20 after:rounded-full after:border-2 after:border-y-indigo-500 after:border-x-transparent"></span>
        </div>
    </div>
</template>
<script>
    export default {
        data: () => ({ isLoading: false }),
        mounted() {
            this.$root.$on('set_loader_on', () => this.isLoading = true);
            this.$root.$on('set_loader_off', () => this.isLoading = false);
        }
    }
</script>
<style scoped>
    .animated-loader {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }

    @-webkit-keyframes fadeIn {
        0% {opacity: 0;}
        100% {opacity: 1;}
    }

    @keyframes fadeIn {
        0% {opacity: 0;}
        100% {opacity: 1;}
    }

    @-webkit-keyframes fadeOut {
        0% {opacity: 1;}
        100% {opacity: 0;}
    }

    @keyframes fadeOut {
        0% {opacity: 1;}
        100% {opacity: 0;}
    }

    .fade-in {
        -webkit-animation-name: fadeIn;
        animation-name: fadeIn;
    }

    .fade-out {
        -webkit-animation-name: fadeOut;
        animation-name: fadeOut;
    }
</style>
