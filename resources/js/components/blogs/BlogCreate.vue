<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <h4>Create new data</h4>
        <br>
        <form @submit.prevent="addData()">
          <div class="form-group">
            <label>Title</label><br>
            <input type="text" placeholder="Input title" v-model="form.nameTitle" required>
			<input type="hidden" placeholder="Input member" v-model="form.nameMember" required>
          </div>
          <div class="form-group">
            <label>Content</label><br>
            <textarea placeholder="Input content" v-model="form.nameContent" required></textarea>
          </div>
          <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      form:{
        nameTitle: '',
        nameContent: '',
        nameMember: '1'
      }
    }
  },
  methods: {
    addData() {
      axios
        .post("http://localhost:8000/api/blog", {
          title: this.form.nameTitle,
          content: this.form.nameContent,
          id_member: this.form.nameMember
        })
        .then(response => {
          this.$router.push("/dashboard");
        });
    }
  }
};
</script>
