import { createRouter, createWebHistory } from 'vue-router'

import HomeIndex from '../components/home/HomeIndex.vue'; 
import BlogIndex from '../components/blogs/BlogIndex.vue';
import BlogRead from '../components/blogs/BlogRead.vue';
import BlogCreate from '../components/blogs/BlogCreate.vue';
import BlogUpdate from '../components/blogs/BlogUpdate.vue';
 
const routes = [
    {
        path: '/',
        name: 'home.index',
        component: HomeIndex
    },
	{
        path: '/dashboard',
        name: 'blog.index',
        component: BlogIndex
    },
	{
        path: '/blog/:id',
        name: 'blog.read',
        component: BlogRead
    },
	{
        path: '/blog/create',
        name: 'blog.create',
        component: BlogCreate
    },
    {
        path: '/blog/edit/:id',
        name: 'blog.update',
        component: BlogUpdate
    },
];
 
export default createRouter({
    history: createWebHistory(),
    routes
})