<template>
    <div class="w-full md:max-w-7xl md:mx-auto flex justify-between mb-4">
        <div></div>
        <BaseButton @click="router.push({name: 'Blog'})">List All Blog</BaseButton>
    </div>

    <BaseCard class="p-6">
        <BlogForm></BlogForm>
    </BaseCard>
</template>

<script>
export default {
    name: 'BlogAction'
}
</script>

<script setup>
import { useRouter } from "vue-router";
import BlogForm from "./Form";

const router = useRouter();
</script>
