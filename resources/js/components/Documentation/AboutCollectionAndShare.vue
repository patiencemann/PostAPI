<template>
    <div class="relative sm:invisible xs:invisible xl:visible sm:hidden xs:hidden xl:block">
        <div>
            <div style="padding-bottom: 583px"></div>
            <div class="opacity-100 border border-gray-100 rounded-lg bg-white px-3 py-2.5 shadow-md shadow-shadow-200" style="position: fixed; top: 23vh; left: 100px; width: 220px; transform: translateZ(0px);">
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
                            <div class="novashare-buttons novashare-floating novashare-no-print">
                                <vue-goodshare-twitter
                                    :page_url="page_url"
                                    :page_title="page_title"
                                    :page-description="page_description"
                                    has_icon
                                >
                                </vue-goodshare-twitter>
                                <vue-goodshare-facebook
                                    :page_url="page_url"
                                    :page_title="page_title"
                                    :page-description="page_description"
                                    has_icon
                                >
                                </vue-goodshare-facebook>
                                <vue-goodshare-linkedIn
                                    :page_url="page_url"
                                    :page_title="page_title"
                                    :page-description="page_description"
                                    has_icon
                                >
                                </vue-goodshare-linkedIn>
                            </div>
                            <div class="share__action" data-interface="DownloadPostForm">
                                <button @click="exportInPDF" class="opacity-100 border border-gray-100 rounded-[10px] px-3 py-2 bg-red-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75v6.75m0 0l-3-3m3 3l3-3m-8.25 6a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                    </svg>
                                </button>
                                <button @click="exportInDOCX" class="opacity-100 border border-gray-100 rounded-[10px] px-2 py-2 bg-indigo-500 text-white">
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
    </div>
</template>
<script>
    import VueGoodshareFacebook from "vue-goodshare/src/providers/Facebook.vue";
    import VueGoodshareTwitter from "vue-goodshare/src/providers/Twitter.vue";
    import VueGoodshareLinkedIn from "vue-goodshare/src/providers/LinkedIn.vue";
    import html2pdf from "html2pdf.js";

    export default {
        props: {
            collection_items: {require: true},
            page_url: {
                type: String,
                default: window.location.href,
            },
            page_description: {
                type: String,
                default: () => "",
            },
            page_title: {
                type: String,
                default: () => "",
            },
        },
        data : () => ({
            source: "downloadable"
        }),
        components: {
            // Social links
            VueGoodshareFacebook,
            VueGoodshareTwitter,
            VueGoodshareLinkedIn,
        },
        methods: {
            exportInPDF() {
                let options = {
                    margin: 5,
                    enableLinks: true,
                    pagebreak: { mode: 'avoid-all', before: '#page_brak_post_content' },
                    image: { type: 'jpeg', quality: 0.98 },
                    filename: this.page_title+'-from-patienceman.com.pdf',
                };

                html2pdf(document.getElementById(this.source), options);
            },
            exportInDOCX() {
                var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
                        "xmlns:w='urn:schemas-microsoft-com:office:word' "+
                        "xmlns='http://www.w3.org/TR/REC-html40'>"+
                        "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
                var footer = "</body></html>";
                var sourceHTML = header+document.getElementById(this.source).innerHTML+footer;

                var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
                var fileDownload = document.createElement("a");

                document.body.appendChild(fileDownload);
                fileDownload.href = source;
                fileDownload.download = 'document.docx';
                fileDownload.click();
                document.body.removeChild(fileDownload);
            },
        }
    }
</script>
<style scoped>
    .button-social {
        padding: 3px 8px !important;
        font-size: 14px !important;
    }
</style>
