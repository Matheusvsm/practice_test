<template>
  <div class="hold-transition login-page">
    <div class="login-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="../../index2.html" class="h1"><b>Projeto</b>Teste</a>
        </div>
        <RouterView />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AuthLayout",
};
</script>

<style scoped>
.login-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}
</style>
