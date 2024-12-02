<script lang="ts" setup>
import { Link } from '@inertiajs/vue3'

interface LinkType {
    label: string;
    url: string | null;
}

const props = defineProps<{
    links: LinkType[];
}>();
</script>

<template>
    <nav class="flex justify-center items-center space-x-2 my-2">
        <div v-for="(link, index) in links" :key="index">
            <Link :href="link.url" class="text-gray-500 hover:text-gray-700">
                {{ link.label }}
            </Link>
        </div>
    </nav>
</template>
