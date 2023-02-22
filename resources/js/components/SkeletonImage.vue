<template>
  <div :ref=refImagen>
    <div v-if="!loaded" style="width:100%">
      <vue-skeleton-loader type="rect" :width=widthImagen :height=heightImagen animation="wave"></vue-skeleton-loader>
    </div>

    <img v-if="loaded" :src="urlImagen" class="img-fluid" />

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
    };
  },
  methods: {
    onLoad() {
      console.log('onload');
      this.loaded = true;
    },
    handleIntersection(entries) {

      entries.forEach(entry => {

        if (entry.isIntersecting) {

          //console.log('adentro')

          const img = new Image();
          img.src = this.urlImagen;
          img.onload = () => {
            //this.imageLoaded = true;
            //console.log('img cargada');
            this.loaded = true;
          };
    
        }
      });
    },
  },
  
  mounted() {
    const observer = new IntersectionObserver(this.handleIntersection, {
      rootMargin: '0px',
      threshold: 1.0
    });

    observer.observe(this.$refs[this.refImagen]);

  },

  props: {
    refImagen: { type: String, required: true },
    urlImagen: { type: String, required: true },
    widthImagen: { type: Number, required: true },
    heightImagen: { type: Number, required: true },
  }
};

</script>
  