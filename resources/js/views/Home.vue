<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header"> Home</div>
          <div class="card-body">
            Laravel 5
          </div>
          <router-link :to="{ name: 'AdminHome'}">
            <div class="logo">
              AdminLogo
            </div>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>


<script>

  export default {};

</script>
