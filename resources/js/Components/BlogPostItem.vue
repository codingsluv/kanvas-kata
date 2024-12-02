<script lang="ts" setup>
import { BlogPost } from '@/types/types';
import { Link } from '@inertiajs/vue3';
import moment from 'moment';


defineProps<{
    blogPosts: BlogPost
}>();
</script>


<template>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="-my-8 divide-y-2 divide-gray-100">

                <div v-for="post in blogPosts.data" :key="post.id" class="py-8 flex flex-wrap md:flex-nowrap">
                    <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                        <img class="w-40 mb-2" :src="`/storage/${post.image}`" alt="">
                        <span class="font-semibold title-font text-gray-700">POST BY : {{ post.user.name }}</span>
                        <span class="mt-1 text-gray-500 text-sm">{{ moment(post.created_at).startOf('s').fromNow()
                            }}</span>
                    </div>
                    <div class="md:flex-grow">
                        <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">Bitters hashtag waistcoat
                            {{ post.title }}</h2>
                        <p class="leading-relaxed">{{ post.content }}</p>
                        <Link :href="`/blog/${post.id}`" class="text-indigo-500 inline-flex items-center mt-4">view
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                        </Link>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>
