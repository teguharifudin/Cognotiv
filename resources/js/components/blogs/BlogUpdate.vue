<template>
    <h4>Edit</h4>
    <br>
    <form @submit.prevent="updateData()">
	  <div class="form-group">
		<label>Title</label><br>
		<input type="text" v-model="form.title" required>
	  </div>
	  <div class="form-group">
		<label>Content</label><br>
		<textarea v-model="form.content" required></textarea>
	  </div>
	  <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Update</button>
	</form>
</template>
 
<script>
export default {
  data() {
    return {
      form: {
        title: '',
        content: ''
      }
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      axios
        .get('http://localhost:8000/api/blog/' + this.$route.params.id)
        .then(response => {
          this.form.title = response.data.title;
          this.form.content = response.data.content;
        });
    },
    updateData() {
      axios
        .put('http://localhost:8000/api/blog/' + this.$route.params.id, {
          title: this.form.title,
          content: this.form.content
        })
        .then(response => {
          this.$router.push('/dashboard');
        });
    }
  }
};
</script>