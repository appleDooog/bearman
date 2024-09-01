<style>
.adminItems {
  width: 240px;
  height: 60px;
  border-top-right-radius: 40px;
  border-bottom-right-radius: 40px;
  transition: 300ms;

  .rounded-circle {
    width: 40px;
    height: 40px;
  }

  .h4 {
    transform: translateY(10%);
  }  
}

.adminItems:hover {
    width: 260px;
    margin-right: -20px;
}

</style>
<template>
  <div
    class="adminItems d-block border border-1 border-dark bg-white mt-5 ms-4"
  >
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-md-9 text-center h4"><slot></slot></div>
      <div class="col-md-2 rounded-circle me-3"></div>
    </div>
  </div>
</template>
<script>
    export default {
        name: 'adminItems',
        props: {
        }
    }
</script>
