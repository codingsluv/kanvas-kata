<script lang="ts" setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
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
                <button
                    class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"
                >
                    Button
                    <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        class="w-4 h-4 ml-1"
                        viewBox="0 0 24 24"
                    >
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </button>
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
