<style></style>
<template>
  <!-- <div class="container text-center">
    
      <button class="btn slick-arrow"></button>
      <div class="slider center ">
        <div class="h1">1</div>
        <div class="h1">2</div>
        <div class="h1">3</div>
        <div class="h1">4</div>
        <div class="h1">5</div>
      </div>
    
  </div> -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="@/assets/test/bass_lr06.jpg" class="d-block w-100" alt="..." height="750px">
    </div>
    <div class="carousel-item">
      <img src="@/assets/test/drums_lr05.jpg" class="d-block w-100" alt="..." height="750px">
    </div>
    <div class="carousel-item">
        <img src="@/assets/test/guitar_lr04.jpg" class="d-block w-100" alt="..." height="750px">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</template>

<script>
export default {
  methods: {
    slider() {
      $(".center").slick({
        centerMode: true,
        centerPadding: "60px",
        slidesToShow: 3,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: "40px",
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: "40px",
              slidesToShow: 1,
            },
          },
        ],
      });
    },
  },

  mounted() {
    this.slider();
  },
};
</script>
