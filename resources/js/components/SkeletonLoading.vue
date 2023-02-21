<template>
  
  <div v-if="loading">
      
    <vue-skeleton-loader
          :loading="isLoading"
          type="rectangle"
          :width="200"
          :height="100"
          animation="fade"
      ></vue-skeleton-loader>
      
  </div>

  <div v-else>
    
  </div>

</template>



<script>

import VueSkeletonLoader from 'skeleton-loader-vue';

/*
Vue.component('skeleton-loading', {
  props: ['mensaje'],
  template: '<div>{{ mensaje }}</div>'
});
*/

export default {
  components: { VueSkeletonLoader },
  data() {
    return {
      counter: 5,
      isLoading: true,
      loading: true,
    };
  },
  mounted() {
    //console.log('Componen skeaaa.');
    setTimeout(() => {
      this.isLoading = false;
      this.counter = 2;
      this.loading = false;
      //console.log('Componen ske.');
    }, 3000);
  },
};


</script>