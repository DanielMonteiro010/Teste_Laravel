<template>
  <div class="container">
      <h3 align="center" class="mt-5">Cadastros</h3>
      <div class="row">
          <div align="center" class="col-md-12">
            <v-btn type="button"
            color="info"
            @click="currentComponent = 'Cadastro'"
            class="mr-2">Cadastrar</v-btn>
            <v-btn type="button"
            color="info"
            @click="currentComponent = 'TelaPesquisa'"
            class="mr-2">Pesquisar</v-btn>
          </div>
    </div>

    <Cadastro v-if="currentComponent === 'Cadastro'" />
    <TelaPesquisa v-else-if="currentComponent === 'TelaPesquisa'" />
  </div>
</template>

<script setup>
import { ref } from 'vue';
const currentComponent = ref('Cadastro');
</script>