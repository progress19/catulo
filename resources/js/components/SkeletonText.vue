<template>
    <div>
      
      <div v-if="!loaded" style="width:100%">
        <vue-skeleton-loader
          type="rect"
          :width=widthText
          :height=heightText
          animation="wave" 
          rounded
          ></vue-skeleton-loader>
      </div>
    
      <div v-show="loaded" @load="onLoad">{{ text }}</div>

    </div>
</template>
  
  <script>
 
  import VueSkeletonLoader from 'skeleton-loader-vue';

  export default {
    components: { VueSkeletonLoader },
    data() {
      return {
        loaded: false,
        //url: urlImagen,
        //url: "https://picsum.photos/1000/400?random=1",
      };
    },
    methods: {
      onLoad() {
        console.log('onload text');
        this.loaded = true;
      },
    },
    mounted() {
      //this.loaded = true;
      //console.log('Component text mounted');
      setTimeout(() => {
        this.loaded = true;
      }, 2000);
    },
    props: {
      text: { type: String, required: true },
      widthText:{ type: Number, required: true },
      heightText:{ type: Number, required: true },
    }
  };
  
  </script>
  