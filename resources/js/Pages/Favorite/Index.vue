<script lang="ts" setup>
import { BlogPost } from '@/types/types';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import moment from 'moment/moment';
import { Link } from '@inertiajs/vue3';

defineProps<{
    Favorites: BlogPost[]
}>();
</script>

<template>
    <AuthenticatedLayout>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap w-full mb-20">
                    <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
                           Favorite Items</h1>
                        <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                    </div>
                    <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Whatever cardigan tote bag tumblr hexagon
                        brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't
                        heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac
                        humblebrag.</p>
                </div>
                <div class="flex flex-wrap -m-4">

                    <div v-for="fav in Favorites.data"  class="xl:w-1/4 md:w-1/2 p-4">
                        <Link :href="`/blog/${fav.blog_post.id}`" :key="fav.blog_post.id" class="bg-gray-100 p-6 rounded-lg">
                            <img class="h-40 rounded w-full object-cover object-center mb-6"
                                :src="`/storage/${fav.blog_post.image}`" alt="content">
                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">{{ moment(fav.blog_post.created_at).startOf('s').fromNow() }}</h3>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{fav.blog_post.title}}</h2>
                            <p class="leading-relaxed text-base">
                                {{
                                    fav.blog_post.content.length > 200 ?
                                    fav.blog_post.content.substring(0, 200) + '...' : '' }}
                            </p>
                        </Link>
                    </div>
                </div>
            </div>
        </section>

    </AuthenticatedLayout>
</template>
