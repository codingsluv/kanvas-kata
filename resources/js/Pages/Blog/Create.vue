<script lang="ts" setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref } from "vue";
import { Plus } from "@element-plus/icons-vue";
import { useForm } from "@inertiajs/vue3";
import { ElMessageBox } from 'element-plus'
import { ElMessage } from 'element-plus'
import type { DrawerProps } from "element-plus";

import type { UploadProps, UploadUserFile } from "element-plus";
import { router } from '@inertiajs/vue3'
const fileList = ref<UploadUserFile[]>([]);

const dialogImageUrl = ref("");
const dialogVisible = ref(false);

const handleRemove: UploadProps["onRemove"] = (uploadFile, uploadFiles) => {
    console.log(uploadFile, uploadFiles);
};

const handlePictureCardPreview: UploadProps["onPreview"] = (uploadFile) => {
    dialogImageUrl.value = uploadFile.url!;
    dialogVisible.value = true;
};

// form data with type anotation
interface FormData {
    title: string;
    content: string;
    image: File | null;
}

// initialize form data with corect type
const form = useForm<FormData>({
    title: "",
    content: "",
    image: null,
});

const handleFileChange = (file: UploadUserFile) => {
    console.log(`this is file seleted ${file.raw}`);
    if (file.status === "ready") {
        form.image = file.raw as File;
    } else {
        form.image = null;
    }
};

// submit form
const submit = () => {
    form.post("/blog");
};

// drawer
const drawer = ref(false);
const direction = ref<DrawerProps["direction"]>("btt");

const handleClose = (done: () => void) => {
    ElMessageBox.confirm("Are you sure you want to close this?")
        .then(() => {
            done();
        })
        .catch(() => {
            // catch error
        });
};

const content = ref<string>('');
const isGenerating = ref<boolean>(false)

const props = defineProps<{
    content: string // received from generated ai content
}>();

form.content = props.content || '';

//generate poem function
const generatePeom = () => {
    if (content.value.trim() === '') {
        ElMessage({
            message: 'Please enter some content',
            type: 'warning'
        })
    }
    isGenerating.value = true;

    router.post('/blog/create',
        {
            method: 'post',
            data: { prompt: content.value },
            onsuccess: page => {
                ElMessage({
                    message: "Poem generated successfully",
                    type: 'success'
                })
            },
        }
    )

}
</script>

<template>
    <AuthenticatedLayout>
        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-12">
                    <h1
                        class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white"
                    >
                        Tulis Sajak/Puisi
                    </h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
                        Apa yang ingin anda tuliskan?
                    </p>
                </div>
                <form @submit.prevent="submit">
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label
                                        for="title"
                                        class="leading-7 text-sm text-gray-600"
                                        >Judul</label
                                    >
                                    <input
                                        v-model="form.title"
                                        type="text"
                                        id="title"
                                        name="title"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    />
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label
                                        for="content"
                                        class="leading-7 text-sm text-gray-600"
                                        >Sajak/Puisi</label
                                    >
                                    <textarea
                                        v-model="form.content"
                                        id="content"
                                        name="content"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                    ></textarea>
                                    <button @click="drawer = true"
                                        class="absolute right-0 bg-white inset-y-0 rounded-full cursor-pointer w-12 h-12 m-2 top-8"
                                    >
                                        <svg
                                            viewBox="0 0 24 24"
                                            class="w-12 p-2"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <g
                                                id="SVGRepo_bgCarrier"
                                                stroke-width="0"
                                            ></g>
                                            <g
                                                id="SVGRepo_tracerCarrier"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            ></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M8.99999 1C8.99999 0.447715 8.55228 0 7.99999 0C7.44771 0 6.99999 0.447715 6.99999 1V1.5C6.99999 2.05228 7.44771 2.5 7.99999 2.5C8.55228 2.5 8.99999 2.05228 8.99999 1.5V1ZM3.7071 2.29289C3.31657 1.90237 2.68341 1.90237 2.29288 2.29289C1.90236 2.68342 1.90236 3.31658 2.29288 3.70711L3.29288 4.70711C3.68341 5.09763 4.31657 5.09763 4.7071 4.70711C5.09762 4.31658 5.09762 3.68342 4.7071 3.29289L3.7071 2.29289ZM13.7071 3.70711C14.0976 3.31658 14.0976 2.68342 13.7071 2.29289C13.3166 1.90237 12.6834 1.90237 12.2929 2.29289L11.2929 3.29289C10.9024 3.68342 10.9024 4.31658 11.2929 4.70711C11.6834 5.09763 12.3166 5.09763 12.7071 4.70711L13.7071 3.70711ZM1 7C0.447715 7 0 7.44772 0 8C0 8.55228 0.447715 9 1 9H1.5C2.05228 9 2.5 8.55228 2.5 8C2.5 7.44772 2.05228 7 1.5 7H1ZM15 7C14.4477 7 14 7.44772 14 8C14 8.55228 14.4477 9 15 9H15.5C16.0523 9 16.5 8.55228 16.5 8C16.5 7.44772 16.0523 7 15.5 7H15ZM4.70711 12.7071C5.09763 12.3166 5.09763 11.6834 4.70711 11.2929C4.31658 10.9024 3.68342 10.9024 3.29289 11.2929L2.29289 12.2929C1.90237 12.6834 1.90237 13.3166 2.29289 13.7071C2.68342 14.0976 3.31658 14.0976 3.70711 13.7071L4.70711 12.7071ZM9 15C9 14.4477 8.55228 14 8 14C7.44772 14 7 14.4477 7 15V15.5C7 16.0523 7.44772 16.5 8 16.5C8.55228 16.5 9 16.0523 9 15.5V15ZM9.41421 4.99998C8.63316 4.21894 7.36683 4.21894 6.58579 4.99998L5 6.58577C4.21895 7.36682 4.21895 8.63315 5 9.4142L7.29289 11.7071L18.5858 23C19.3668 23.781 20.6332 23.781 21.4142 23L23 21.4142C23.781 20.6331 23.781 19.3668 23 18.5858L11.7071 7.29288L9.41421 4.99998ZM6.41421 7.99998L8 6.4142L9.58579 7.99998L8 9.58577L6.41421 7.99998ZM9.41421 11L11 9.4142L21.5858 20L20 21.5858L9.41421 11Z"
                                                    fill="#000000"
                                                ></path>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <!-- Image Upload UI -->
                            <el-upload
                                v-model:file-list="fileList"
                                :auto-upload="false"
                                action="https://run.mocky.io/v3/9d059bf9-4660-45f2-925d-ce80ad6c4d15"
                                list-type="picture-card"
                                :on-preview="handlePictureCardPreview"
                                :on-remove="handleRemove"
                                :on-change="handleFileChange"
                            >
                                <el-icon><Plus /></el-icon>
                            </el-upload>

                            <el-dialog v-model="dialogVisible">
                                <img
                                    w-full
                                    :src="dialogImageUrl"
                                    alt="Preview Image"
                                />
                            </el-dialog>
                            <!-- End Image Upload UI -->
                            <div class="p-2 w-full">
                                <button
                                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                >
                                    Save
                                </button>
                            </div>
                            <div
                                class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center"
                            >
                                <span class="inline-flex">
                                    <a class="text-gray-500">
                                        <svg
                                            fill="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            class="w-5 h-5"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"
                                            ></path>
                                        </svg>
                                    </a>
                                    <a class="ml-4 text-gray-500">
                                        <svg
                                            fill="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            class="w-5 h-5"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
                                            ></path>
                                        </svg>
                                    </a>
                                    <a class="ml-4 text-gray-500">
                                        <svg
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            class="w-5 h-5"
                                            viewBox="0 0 24 24"
                                        >
                                            <rect
                                                width="20"
                                                height="20"
                                                x="2"
                                                y="2"
                                                rx="5"
                                                ry="5"
                                            ></rect>
                                            <path
                                                d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"
                                            ></path>
                                        </svg>
                                    </a>
                                    <a class="ml-4 text-gray-500">
                                        <svg
                                            fill="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            class="w-5 h-5"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"
                                            ></path>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <el-drawer
            v-model="drawer"
            title="Buat Tulisan dengan AI 🚀"
            :direction="direction"
            :before-close="handleClose">
            <div class="relative mb-4">
                <label for="message" class="leading-7 text-sm text-gray-600">Biarkan saya yang membuat tulisan 😀</label>
                <textarea v-model="content" id="message" name="message"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                 </textarea>


                <div class="flex justify-end">
                    <button @click="generatePeom" :loading="isGenerating" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                        Generate
                    </button>
                </div>
            </div>
        </el-drawer>

    </AuthenticatedLayout>
</template>
