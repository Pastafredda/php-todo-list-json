<script>
import axios from 'axios';
export default {
  data() {
    return {
      items: []
    }
  },
  mounted() {
    console.log("hello world");

    axios.get('http://localhost/php-todo-list-json/php/')
      .then(response => {
        this.items = response.data;
      })
  }
};

</script>

<template>
  <h1>Hello World</h1>
</template>

<style scoped></style>
