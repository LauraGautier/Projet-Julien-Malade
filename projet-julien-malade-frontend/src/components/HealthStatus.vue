<template>
    <div class="health-status">
      <h2>{{ name }} est malade !</h2>
      <p>On espère qu'il se sente mieux la semaine prochaine !</p>
      <p>Est-ce que Julien se sent mieux aujourd'hui ?</p>
      <button @click="updateHealth(true)" :disabled="status === 'Mieux'">Je me sens mieux !</button>
      <button @click="updateHealth(false)" :disabled="status === 'Malade'">Je suis toujours malade...</button>
      <p>Status: {{ status }}</p>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        name: 'Julien',
        status: 'Malade',
      };
    },
    methods: {
      updateHealth(feelingBetter) {
        this.status = feelingBetter ? 'Mieux' : 'Malade';
        axios.post('http://127.0.0.1:8000/api/update-status', { status: this.status })
          .then(response => {
            console.log('Statut mis à jour: ', response.data);
          })
          .catch(error => {
            console.error('Erreur lors de la mise à jour: ', error);
          });
      },
    },
  };
  </script>
  
  <style scoped>
  button {
    margin: 10px;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
  }
  button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
  }
  </style>
  