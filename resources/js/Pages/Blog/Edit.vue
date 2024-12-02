<script lang="ts" setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import { ref } from 'vue';
import { Plus } from '@element-plus/icons-vue';

import type { UploadProps, UploadUserFile } from 'element-plus';
import { useForm } from '@inertiajs/vue3';

import { ElMessage } from 'element-plus'


import { ElMessageBox } from 'element-plus'
import type { DrawerProps } from 'element-plus'
import { router } from '@inertiajs/vue3'
import { BlogPost, FormData } from '@/types/types';
const props = defineProps<{
    content: string // received from generated ai content
    blogPost: BlogPost
}>();

// Initial file list with one image for demonstration
const fileList = ref<UploadUserFile[]>([
    {
        name: '',
        url: `/storage/${props.blogPost.image}`
}
]);


const dialogImageUrl = ref<string>(`/storage/${props.blogPost.image}`);
const dialogVisible = ref<boolean>(false);

// Function to handle removing images from the UI
const handleRemove: UploadProps['onRemove'] = (uploadFile, uploadFiles) => {
    console.log(uploadFile, uploadFiles);
    // Remove the selected file from the fileList
    fileList.value = uploadFiles;
};

// Function to handle image preview in a dialog
const handlePictureCardPreview: UploadProps['onPreview'] = (uploadFile) => {
    dialogImageUrl.value = uploadFile.url!;
    dialogVisible.value = true;
};


// Form data with type annotations

// interface for blog post



//Initialize from data with correct types
const form = useForm<FormData>({
    title: props.blogPost.title,
    content: props.blogPost.content,
    image: null,
})


const handleFileChange = (file: UploadUserFile) => {
    console.log(`this is file seleted ${file.raw}`)
    if (file.status === 'ready') {
        form.image = file.raw as File;
    } else {
        form.image = null;
    }
}

// submit form

const submit = () => {
    form.post(`/blog/${props.blogPost.id}`)
}
//drawer
const drawer = ref(false)
const direction = ref<DrawerProps['direction']>('btt')


const handleClose = (done: () => void) => {
    ElMessageBox.confirm('Are you sure you want to close this?')
        .then(() => {
            done()
        })
        .catch(() => {
            // catch error
        })
}
//end
const content = ref<string>('');
const isGenerating = ref<boolean>(false)



form.content = props.content || props.blogPost.content;


//generate poem function
const generatePeom = () => {
    if (content.value.trim() === '') {
        ElMessage({
            message: 'Please enter some content',
            type: 'warning'
        })
    }
    isGenerating.value = true;

    router.visit('/blog/create', {
        method: 'post',
        data: { prompt: content.value },
        onSuccess: page => {
            ElMessage({
                message: "Poem generated successfully",
                type: 'success'
            })
        },
    })

}
</script>

<template>
    <AuthenticatedLayout>
        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-12">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Create new post</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">How are you feeling today?</p>
                </div>

                <!-- form inputs -->
                <form @submit.prevent="submit">

                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">Title</label>
                                    <input v-model="form.title" type="text" id="title" name="title"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="message" class="leading-7 text-sm text-gray-600">Poem</label>
                                    <textarea v-model="form.content" id="message" name="message"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                                    </textarea>
                                    <button @click="drawer = true"
                                        class="absolute right-0 top-10 bg-blue-500 inset-y-0 rounded-full cursor-pointer w-12 h-12 m-2">
                                        <svg fill="#fff" viewBox="0 0 32 32" class="w-12 p-2" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>magic</title>
                                                <path
                                                    d="M9.5 9.625l-0.906 2.906-0.875-2.906-2.906-0.906 2.906-0.875 0.875-2.938 0.906 2.938 2.906 0.875zM14.563 8.031l-0.438 1.469-0.5-1.469-1.438-0.469 1.438-0.438 0.5-1.438 0.438 1.438 1.438 0.438zM0.281 24l17.906-17.375c0.125-0.156 0.313-0.25 0.531-0.25 0.281-0.031 0.563 0.063 0.781 0.281 0.094 0.063 0.219 0.188 0.406 0.344 0.344 0.313 0.719 0.688 1 1.063 0.125 0.188 0.188 0.344 0.188 0.5 0.031 0.313-0.063 0.594-0.25 0.781l-17.906 17.438c-0.156 0.156-0.344 0.219-0.563 0.25-0.281 0.031-0.563-0.063-0.781-0.281-0.094-0.094-0.219-0.188-0.406-0.375-0.344-0.281-0.719-0.656-0.969-1.063-0.125-0.188-0.188-0.375-0.219-0.531-0.031-0.313 0.063-0.563 0.281-0.781zM14.656 11.375l1.313 1.344 4.156-4.031-1.313-1.375zM5.938 13.156l-0.406 1.438-0.438-1.438-1.438-0.469 1.438-0.438 0.438-1.469 0.406 1.469 1.5 0.438zM20.5 12.063l0.469 1.469 1.438 0.438-1.438 0.469-0.469 1.438-0.469-1.438-1.438-0.469 1.438-0.438z">
                                                </path>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Image upload UI -->
                            <el-upload :on-change="handleFileChange" v-model:file-list="fileList" :auto-upload="false"
                                action="https://run.mocky.io/v3/9d059bf9-4660-45f2-925d-ce80ad6c4d15"
                                list-type="picture-card" :on-preview="handlePictureCardPreview"
                                :on-remove="handleRemove">
                                <el-icon>
                                    <Plus />
                                </el-icon>
                            </el-upload>

                            <!-- Image preview dialog -->
                            <el-dialog v-model:visible="dialogVisible">
                                <img class="w-full" :src="dialogImageUrl" alt="Preview Image" />
                            </el-dialog>

                            <div class="p-2 w-full">
                                <button
                                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>


                </form>


                <!-- end -->
            </div>
        </section>


        <el-drawer v-model="drawer" title="Generate Poem with AI" :direction="direction" :before-close="handleClose">
            <div class="relative">
                <label for="message" class="leading-7 text-sm text-gray-600">Poem</label>
                <textarea v-model="content" id="message" name="message"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                 </textarea>


                <div class="flex justify-end">
                    <el-button @click="generatePeom" :loading="isGenerating">
                        Generate
                    </el-button>

                </div>
            </div>
        </el-drawer>

    </AuthenticatedLayout>
</template>
