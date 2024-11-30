<script lang="ts" setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { BlogPost } from '@/types/types';
import { Link } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3"

const props =  defineProps<{
    blogPost: BlogPost
}>();

const form = useForm<{
    title: string;
    content: string;
    image: string;
}>(props.blogPost);


//delete fun
const deletePost = () => {
    if (confirm('Are you sure you want to delete this post')) {
        form.delete(`/blog/${props.blogPost.id}`)
    }
}
</script>

<template>
    <AuthenticatedLayout>
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium">
                        {{ blogPost.title }}
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        {{ blogPost.content }}
                    </p>
                    <div class="flex justify-center">
                        <Link :href="`/blog/${blogPost.id}/edit`"
                        class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </Link>
                        <button  @click="deletePost"
                            class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">
                            <svg viewBox="0 0 24 24" class="w-6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M9.87787 4.24993C10.1871 3.37503 11.0215 2.75 12 2.75C12.9785 2.75 13.813 3.37503 14.1222 4.24993C14.2602 4.64047 14.6887 4.84517 15.0793 4.70713C15.4698 4.56909 15.6745 4.1406 15.5365 3.75007C15.022 2.29459 13.634 1.25 12 1.25C10.3661 1.25 8.97804 2.29459 8.46361 3.75007C8.32557 4.1406 8.53026 4.56909 8.9208 4.70713C9.31134 4.84517 9.73983 4.64047 9.87787 4.24993Z"
                                        fill="#1C274C"></path>
                                    <path
                                        d="M2.75 6C2.75 5.58579 3.08579 5.25 3.5 5.25H20.5001C20.9143 5.25 21.2501 5.58579 21.2501 6C21.2501 6.41421 20.9143 6.75 20.5001 6.75H3.5C3.08579 6.75 2.75 6.41421 2.75 6Z"
                                        fill="#1C274C"></path>
                                    <path
                                        d="M5.11686 7.75166C5.53015 7.72411 5.88753 8.03681 5.91508 8.45011L6.37503 15.3492C6.46488 16.6971 6.52891 17.6349 6.66948 18.3405C6.80583 19.025 6.99616 19.3873 7.26957 19.6431C7.54299 19.8988 7.91715 20.0647 8.60915 20.1552C9.32255 20.2485 10.2626 20.25 11.6134 20.25H12.3868C13.7376 20.25 14.6776 20.2485 15.391 20.1552C16.083 20.0647 16.4572 19.8988 16.7306 19.6431C17.004 19.3873 17.1943 19.025 17.3307 18.3405C17.4712 17.6349 17.5353 16.6971 17.6251 15.3492L18.0851 8.45011C18.1126 8.03681 18.47 7.72411 18.8833 7.75166C19.2966 7.77921 19.6093 8.13659 19.5818 8.54989L19.1183 15.5016C19.0328 16.7844 18.9637 17.8205 18.8018 18.6336C18.6334 19.4789 18.347 20.185 17.7554 20.7384C17.1638 21.2919 16.4402 21.5307 15.5856 21.6425C14.7635 21.75 13.7251 21.75 12.4395 21.75H11.5607C10.2751 21.75 9.23663 21.75 8.41459 21.6425C7.55994 21.5307 6.83639 21.2919 6.2448 20.7384C5.6532 20.185 5.36678 19.4789 5.19838 18.6336C5.03641 17.8205 4.96735 16.7844 4.88186 15.5016L4.41841 8.54989C4.39085 8.13659 4.70356 7.77921 5.11686 7.75166Z"
                                        fill="#1C274C"></path>
                                </g>
                            </svg>
                        </button>



                        <Favorite :id="blogPost.id" ></Favorite>
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded" alt="hero" :src="`/storage/${blogPost.image}`">
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
