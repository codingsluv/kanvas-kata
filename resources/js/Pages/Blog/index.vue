<script lang="ts" setup>
import Pagination from "@/Components/Pagination.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import moment from "moment";
import { Head } from '@inertiajs/vue3';

interface BlogPost {
    id: number;
    tile: string;
    content: string;
    image: string;
}

interface PaginationData {
  current_page: number;
  last_page: number;
  prev_page_url: string | null;
  next_page_url: string | null;
}

defineProps<{
  blogPosts: BlogPost[];
  pagination: PaginationData;
}>();

function handlePagination(url: string) {
  router.get(url, {}, { preserveState: true, preserveScroll: true });
}
</script>

<template>
    <Head title="Blog"/>
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
                <nav
                    class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center"
                ></nav>
                <Link
                    href="/blog/create"
                    class="inline-flex items-center bg-slate-50 border-0 py-1 px-3 focus:outline-none hover:bg-purple-300 rounded text-base text-black mt-4 md:mt-0"
                >
                    Tulis

                    <svg
                        viewBox="0 0 24 24"
                        class="w-6 h-6 ml-2"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g
                            id="SVGRepo_tracerCarrier"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        ></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z"
                                stroke="#000000"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                        </g>
                    </svg>
                </Link>
            </div>
        </header>
        <!-- End Page Heading -->

        <!-- Start Section Content -->
        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-24 mx-auto">
                <div class="-my-8 divide-y-2 divide-gray-100">
                    <div
                        v-for="post in blogPosts.data"
                        :key="post.id"
                        class="py-8 flex flex-wrap md:flex-nowrap"
                    >
                        <div
                            class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col"
                        >
                            <img
                                :src="`/storage/${post.image}`"
                                class="w-48 h-48 mb-2 object-cover object-center rounded-lg"
                                alt=""
                            />
                            <span
                                class="font-semibold title-font text-gray-700"
                                >{{ post.user.name }}</span
                            >
                            <span class="mt-1 text-gray-500 text-sm">{{
                                moment(String(post.created_at))
                                    .startOf("s")
                                    .from()
                            }}</span>
                        </div>
                        <div class="md:flex-grow">
                            <h2 class="text-2xl font-medium title-font mb-2">
                                {{ post.title }}
                            </h2>
                            <p class="leading-relaxed">
                                {{ post.content }}
                            </p>
                            <Link
                                :href="`/blog/${post.id}`"
                                class="text-indigo-500 inline-flex items-center mt-4"
                                >View More
                                <svg
                                    class="w-4 h-4 ml-2"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section Content -->

        <!-- Start Pagination -->
        <div class="py-24 px-4 mx-auto">
            <div class="flex justify-center align-items-center">
                <Pagination :pagination="pagination" @paginate="handlePagination"></Pagination>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
