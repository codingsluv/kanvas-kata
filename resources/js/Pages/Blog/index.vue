<script lang="ts" setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <AuthenticatedLayout>
        <!-- Page Heading -->
        <header class="text-gray-600 body-font">
            <div
                class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center"
            >
                <a
                    class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0"
                >
                    <span class="ml-3 text-xl text-white">Kanvas Kata.</span>
                </a>
                <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center" >
                </nav>
                <Link href="/blog/create"
                    class="inline-flex items-center bg-slate-50 border-0 py-1 px-3 focus:outline-none hover:bg-purple-300 rounded text-base text-black mt-4 md:mt-0">
                    Tulis

                    <svg viewBox="0 0 24 24" class="w-6 h-6 ml-2" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                            <path d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                    </g></svg>
                </Link>
            </div>
        </header>
        <!-- End Page Heading -->

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -mx-4 -my-8">
                    <div class="py-8 px-4 lg:w-1/3">
                        <div class="h-full flex items-start">
                            <div
                                class="w-12 flex-shrink-0 flex flex-col text-center leading-none"
                            >
                                <span
                                    class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200"
                                    >Jul</span
                                >
                                <span
                                    class="font-medium text-lg text-gray-800 title-font leading-none"
                                    >18</span
                                >
                            </div>
                            <div class="flex-grow pl-6">
                                <h2
                                    class="tracking-widest text-xs title-font font-medium text-purple-500 mb-1"
                                >
                                    CATEGORY
                                </h2>
                                <h1
                                    class="title-font text-xl font-medium text-gray-900 mb-3"
                                >
                                    The 400 Blows
                                </h1>
                                <p class="leading-relaxed mb-5">
                                    Photo booth fam kinfolk cold-pressed
                                    sriracha leggings jianbing microdosing
                                    tousled waistcoat.
                                </p>
                                <a class="inline-flex items-center">
                                    <img
                                        alt="blog"
                                        src="https://dummyimage.com/103x103"
                                        class="w-8 h-8 rounded-full flex-shrink-0 object-cover object-center"
                                    />
                                    <span class="flex-grow flex flex-col pl-3">
                                        <span
                                            class="title-font font-medium text-gray-900"
                                            >Alper Kamu</span
                                        >
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="py-8 px-4 lg:w-1/3">
                        <div class="h-full flex items-start">
                            <div
                                class="w-12 flex-shrink-0 flex flex-col text-center leading-none"
                            >
                                <span
                                    class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200"
                                    >Jul</span
                                >
                                <span
                                    class="font-medium text-lg text-gray-800 title-font leading-none"
                                    >18</span
                                >
                            </div>
                            <div class="flex-grow pl-6">
                                <h2
                                    class="tracking-widest text-xs title-font font-medium text-purple-500 mb-1"
                                >
                                    CATEGORY
                                </h2>
                                <h1
                                    class="title-font text-xl font-medium text-gray-900 mb-3"
                                >
                                    Shooting Stars
                                </h1>
                                <p class="leading-relaxed mb-5">
                                    Photo booth fam kinfolk cold-pressed
                                    sriracha leggings jianbing microdosing
                                    tousled waistcoat.
                                </p>
                                <a class="inline-flex items-center">
                                    <img
                                        alt="blog"
                                        src="https://dummyimage.com/102x102"
                                        class="w-8 h-8 rounded-full flex-shrink-0 object-cover object-center"
                                    />
                                    <span class="flex-grow flex flex-col pl-3">
                                        <span
                                            class="title-font font-medium text-gray-900"
                                            >Holden Caulfield</span
                                        >
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="py-8 px-4 lg:w-1/3">
                        <div class="h-full flex items-start">
                            <div
                                class="w-12 flex-shrink-0 flex flex-col text-center leading-none"
                            >
                                <span
                                    class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200"
                                    >Jul</span
                                >
                                <span
                                    class="font-medium text-lg text-gray-800 title-font leading-none"
                                    >18</span
                                >
                            </div>
                            <div class="flex-grow pl-6">
                                <h2
                                    class="tracking-widest text-xs title-font font-medium text-purple-500 mb-1"
                                >
                                    CATEGORY
                                </h2>
                                <h1
                                    class="title-font text-xl font-medium text-gray-900 mb-3"
                                >
                                    Neptune
                                </h1>
                                <p class="leading-relaxed mb-5">
                                    Photo booth fam kinfolk cold-pressed
                                    sriracha leggings jianbing microdosing
                                    tousled waistcoat.
                                </p>
                                <a class="inline-flex items-center">
                                    <img
                                        alt="blog"
                                        src="https://dummyimage.com/101x101"
                                        class="w-8 h-8 rounded-full flex-shrink-0 object-cover object-center"
                                    />
                                    <span class="flex-grow flex flex-col pl-3">
                                        <span
                                            class="title-font font-medium text-gray-900"
                                            >Henry Letham</span
                                        >
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
