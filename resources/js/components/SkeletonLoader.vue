<template>
  <div>
    <div v-if="loading">
      <skeleton-loader :animation="animation" :count="5" />
    </div>
    <div v-else>
      <h1>{{ title }}</h1>
      <ul>
        <li v-for="item in items" :key="item.id">{{ item.name }}</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
      animation: 'wave',
      title: '',
      items: []
    };
  },
  mounted() {
    // Simula una carga de datos asincrónica con un temporizador de 2 segundos.
    setTimeout(() => {
      this.loading = false;
      this.title = 'Ejemplo de carga con Skeleton Loader Vue';
      this.items = [
        { id: 1, name: 'Item 1' },
        { id: 2, name: 'Item 2' },
        { id: 3, name: 'Item 3' },
        { id: 4, name: 'Item 4' },
        { id: 5, name: 'Item 5' },
      ];
    }, 2000);
  }
};
</script>
