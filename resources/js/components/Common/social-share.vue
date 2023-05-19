<template>
    <div class="fixed left-[40vw] bottom-4 z-20 flex w-auto border border-gray-100 flex-grow items-center justify-between rounded-full bg-white px-3 py-2.5 shadow-md shadow-shadow-200 dark:!bg-navy-800 dark:shadow-none md:w-[365px] md:flex-grow-0 md:gap-1 xl:w-[365px] xl:gap-2">
        <div class="text-gray-500 font-anek font-bold capitalize"><span>{{ page_title }}</span></div>
        <div class="flex flex-grow items-center gap-2 ml-4">
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
</template>
<script>
import html2pdf from "html2pdf.js";

export default {
    props: {
        page_title: String,
    },
    methods: {
        saveDocAsPDF() {
            let options = {
                margin: 5,
                enableLinks: true,
                pagebreak: {
                    mode: "avoid-all",
                    before: "#page_brak_post_content",
                },
                image: { type: "jpeg", quality: 0.98 },
                filename: this.page_title + "-from-postapi.com.pdf",
            };

            html2pdf(document.getElementById("downloadable"), options);
        },
    },
};
</script>
<style scoped>
.share {
    grid-gap: 1rem;
    align-items: center;
    background-color: white;
    border-radius: 0.5rem;
    color: #44414e;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    justify-content: space-between;
    padding: 1rem 2rem;
    text-align: center;
    border: 1px solid #dbe0e4;
}

@media (min-width: 64em) {
    .share {
        flex-direction: row;
        justify-content: flex-start;
        text-align: left;
    }
}

.share__text {
    color: inherit;
    flex-shrink: 1;
    font-family: "Anek Telugu", sans-serif;
    font-size: 1.4rem !important;
    font-weight: 600;
    line-height: 1.2;
    margin: 0;
}

@media (min-width: 64em) {
    .share__text {
        font-size: 1rem;
    }

    .share__action {
        margin-left: auto;
    }
}

.novashare-buttons-wrapper {
    flex-direction: row;
    flex-wrap: nowrap;
}

.novashare-buttons-wrapper,
a.novashare-button {
    align-items: center;
    display: flex;
    justify-content: center;
}

a.novashare-button {
    grid-gap: 0.5rem;
    color: inherit;
    gap: 0.5rem;
    height: 2rem;
    padding: 0.5rem;
    transition: color 0.2s;
    width: 2rem;
}

a.novashare-button:focus,
a.novashare-button:hover {
    color: #5333ed;
}

a.novashare-button svg {
    height: 1rem;
    width: 1rem;
}

.novashare-hide {
    clip: rect(1px 1px 1px 1px);
    clip: rect(1px, 1px, 1px, 1px);
    height: 1px;
    min-height: 0;
    min-width: 0;
    overflow: hidden;
    position: absolute;
    white-space: nowrap;
    width: 1px;
}

@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(1turn);
    }
}

@keyframes fade-in {
    0% {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

.yogurt-w1ph0e {
    -webkit-tap-highlight-color: transparent;
    font-family: "Anek Telugu", sans-serif;
    appearance: none;
    box-sizing: border-box;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    line-height: 1;
    text-align: center !important;
    display: inline-block;
    color: white;
    border: 2px solid transparent;
    padding: 0.2em 0.8em;
    height: auto;
    transition: border-color 0.2s ease 0s, background-color 0.2s ease 0s,
        color 0.2s ease 0s;
    box-sizing: content-box !important;
    margin-left: 10px;
}

.yogurt-w1ph0e .yogurt-3xbgk5 {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    align-content: center;
    text-align: center;
    box-sizing: content-box !important;
}
</style>
