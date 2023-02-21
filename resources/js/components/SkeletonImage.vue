<template>
    <div>
      <div v-if="!loaded" style="width:100%">
        <vue-skeleton-loader
          type="rect"
          :width=widthImagen
          :height=heightImagen
          animation="wave" 
          ></vue-skeleton-loader>
      </div>

      <img v-show="loaded" :src="urlImagen" @load="onLoad" class="img-fluid" /> 
     
    </div>
</template>
  
  <script>
 
  import VueSkeletonLoader from 'skeleton-loader-vue';

  export default {
    name: 'skeleton-image',
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
        console.log('onload');
        this.loaded = true;
      },
    },
    mounted() {
      console.log('Componen skeaaa.');
    },
    props: {
      urlImagen: { type: String, required: true },
      widthImagen: { type: Number, required: true },
      heightImagen: { type: Number, required: true },
    }
  };
  
  </script>
  