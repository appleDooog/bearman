<template>
    <div class="vh-100 text-center align-content-center fs-1">
      <img src="@/assets/LOGO/Logo-green.png" alt="" width="150px" />
      <p class=" color-g1 tlt">工事中...</p>
    </div>
  </template>
  
  <style>
  
  </style>
  
  <script>
  export default {
    name: "working",
    methods: {
      tlt(){
  
        $('.tlt').textillate({ in: { effect: 'bounce', sequence: true, delayScale: 4, }, out:{effect: 'bounce', sequence: true, delayScale: 4,}, loop: true, minDisplayTime: 100
      });}
    },
    mounted(){
      this.tlt();
    }
  };
  </script>