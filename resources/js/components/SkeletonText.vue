<template>
    
    <div :ref=refText> 
      
      <div v-if="!loaded" style="width:100%">
        <vue-skeleton-loader
          type="rect"
          :width=widthText
          :height=heightText
          animation="wave" 
          rounded
          ></vue-skeleton-loader>
      </div>
    
      <div v-show="loaded" class="animate__animated animate__fadeIn" >{{ text }}</div>

    </div>

</template>
  
  <script>
 
  import VueSkeletonLoader from 'skeleton-loader-vue';

  export default {
    components: { VueSkeletonLoader },
    data() {
      return {
        loaded: false,
      };
    },
    methods: {
      
      handleIntersection(entries) {

        entries.forEach(entry => {

          if (entry.isIntersecting) {
      
            setTimeout(() => {
              this.loaded = true;
            }, 2000);

          }
        });
      },
      
      onLoad() {
        console.log('onload text');
        this.loaded = true;
      },

    },
    mounted() {
      const observer = new IntersectionObserver(this.handleIntersection, {
        rootMargin: '0px',
        threshold: 1.0
      });

      observer.observe(this.$refs[this.refText]);

    },
    props: {
      refText: { type: String, required: true },
      text: { type: String, required: true },
      widthText:{ type: Number, required: true },
      heightText:{ type: Number, required: true },
    }
  };
  
  </script>
  