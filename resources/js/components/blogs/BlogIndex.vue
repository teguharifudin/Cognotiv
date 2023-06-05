<template>
    <div class="flex place-content-end mb-4">
        <router-link :to="{ name: 'blog.create' }" class="text-sm font-medium">+Create Blog</router-link>
    </div>
 
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Title</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">By</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Status</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Action</span>
                </th>
            </tr>
            </thead>
 
            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="blog in blogs" :key="blog.id">
                <tr class="bg-white">
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <router-link :to="'/blog/'+blog.id" class="text-sm font-medium">{{ blog.title }}</router-link>
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ blog.id_member }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ blog.status }}
                    </td>
					<td class="px-6 py-4 text-sm text-center leading-5 text-gray-900 whitespace-no-wrap">
						<router-link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" :to="'/blog/edit/'+blog.id">Edit</router-link>&nbsp;
						<button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" v-on:click="deleteData(blog.id)">Delete</button>
					</td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>
 
<script>
export default {
  data() {
    return {
      blogs: []
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      axios.get("http://localhost:8000/api/blog").then(response => {
        this.blogs = response.data;
      });
    },
    deleteData(id) {
      axios.delete("http://localhost:8000/api/blog/" + id).then(response => {
        this.loadData();
      });
    }
  }
};
</script>