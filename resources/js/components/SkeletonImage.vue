<template>
  <div :ref=refImage>
    <div v-if="!loaded" style="width:100%">
      <vue-skeleton-loader type="rect" :width=widthImage :height=heightImage animation="wave"></vue-skeleton-loader>
    </div>

    <img v-if="loaded" :src="urlImage" :class=classImage />

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
          img.src = this.urlImage;
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

    observer.observe(this.$refs[this.refImage]);

  },

  props: {
    refImage: { type: String, required: true },
    urlImage: { type: String, required: true },
    widthImage: { type: Number, required: true },
    heightImage: { type: Number, required: true },
    classImage: { type: String, required: true },
  }
};

</script>
  