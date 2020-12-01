<template>
<div class="jumbotron vertical-center">
    <router-view></router-view>
</div>
</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>
.jumbotron{
	background: 0;
}

.vertical-center-test {
  min-height: 100%;
  min-height: 100vh;

  display: flex;
  align-items: center;
}
</style>
