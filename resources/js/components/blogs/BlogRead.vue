<template>
    <h2>{{ form.title }}</h2>
    <p>{{ form.content }}</p>
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
    }
  }
};
</script>