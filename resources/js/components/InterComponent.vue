
<template>
    <div>
      <img
        ref="image"
        v-bind:src="imageLoaded ? 'ruta/a/la/imagen' : ''"
        v-bind:alt="imageLoaded ? 'Descripción de la imagen' : 'Imagen no cargada'"
      />
    </div>
  </template>
  
<script>

import InterComponent from './InterComponent.vue';

export default {
    
    data() {
      return {
        imageLoaded: false,
        //url: urlImagen,
        //url: "https://picsum.photos/1000/400?random=1",
      };
    },
    
    methods: {
        
        handleIntersection(entries) {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    console.log('adentro')

                    const img = new Image();
                    img.src = 'images/argentina-flag.png';
                    img.onload = () => {
                        this.imageLoaded = true;
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

        observer.observe(this.$refs.image);

    },

}
</script>
  