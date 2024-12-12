<template>
    <div class="flex justify-center mt-4">
      <button
        :disabled="!pagination.prev_page_url"
        @click="$emit('paginate', pagination.prev_page_url)"
        class="px-3 py-1 border rounded-l-md bg-gray-200 hover:bg-gray-300"
      >
        Previous
      </button>
      <span class="px-4 py-1 bg-gray-100 border-t border-b">{{ pagination.current_page }} / {{ pagination.last_page }}</span>
      <button
        :disabled="!pagination.next_page_url"
        @click="$emit('paginate', pagination.next_page_url)"
        class="px-3 py-1 border rounded-r-md bg-gray-200 hover:bg-gray-300"
      >
        Next
      </button>
    </div>
  </template>

  <script lang="ts">
  import { defineComponent } from "vue";

  export default defineComponent({
    props: {
      pagination: {
        type: Object,
        required: true,
      },
    },
  });
  </script>
