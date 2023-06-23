<script>
import axios from 'axios';
export default {
  data() {
    return {
      items: [],
      newTask: {
        text: ""
      }
    }
  },
  methods: {
    onSubmit() {
      const url = 'http://localhost/php-todo-list-json/php/newTask.php';
      const data = this.newTask;
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };
      axios.post(url, data, headers)
        .then(response => {
          const data = response.data;
          this.items = data;

          this.newTask.text = '';

        })
    },
    deleteTask(index) {
      const url = 'http://localhost/php-todo-list-json/php/deleteTask.php';
      const data = { "index": index };
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };
      axios.post(url, data, headers)
        .then(response => {
          const data = response.data;
          this.items = data;

        })
    },
    taskDone(index) {
      const url = 'http://localhost/php-todo-list-json/php/deleteTask.php';
      const data = { "index": index };
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };
      axios.post(url, data, headers)
        .then(response => {
          const data = response.data;
          this.items = data;

        })
    }

  },
  mounted() {
    axios.get('http://localhost/php-todo-list-json/php/')
      .then(response => {
        const data = response.data;
        this.items = data;
      })
  }
};

</script>

<template>
  <div class="container">
    <header>
      <h1>To do List</h1>
    </header>

    <div class="aggiungi-task">
      <input type="text" name="name" placeholder="Inserisci Task" v-model="newTask.text" @keyup.enter="onSubmit" />
      <button @click="onSubmit">Aggiungi</button>
    </div>

    <div class="task-container">
      <ul>
        <li class="task" v-for="(task, index) in items" :key="index" :class="task.done === 'sbarrato' ? '' : false"
          @click="taskDone(i)">
          {{ task.text }}<i class="fa-solid fa-x" @click="deleteTask(index)"></i>
        </li>
      </ul>
    </div>
  </div>
</template>

<style scoped>
* {
  padding: 0;
  margin: 0;
  box-sizing: 0;
}

.container {
  margin: auto;
}

header {
  text-align: center;
  margin-top: 100px;
  font-size: 24px;
  color: rgb(203, 0, 0);
}

.aggiungi-task {
  display: flex;
  justify-content: center;
  margin-top: 50px;
}

.aggiungi-task input {
  border-radius: 8px;
  padding: 0 8px;
  width: 400px;
  height: 30px;
}

.aggiungi-task button {
  margin-left: 10px;
  width: 100px;
  border-radius: 8px;
}

.task-container {
  display: flex;
  justify-content: center;


}

.task-container ul {
  width: 600px;
  margin: 40px;
  background-color: #e9e9ed;
  border-radius: 12px;
}

.task {
  width: 80%;
  margin: auto;
  padding: 5px 20px;
  margin-bottom: 20px;
  margin-top: 20px;
  list-style-type: none;
  border-bottom: 1px solid rgb(200, 200, 200);
  cursor: pointer;
}


.task .fa-x {
  float: right;
  cursor: pointer;
}

.sbarrato {
  text-decoration: line-through;
}
</style>
