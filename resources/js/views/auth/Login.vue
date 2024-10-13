<template>
  <div class="login-container">
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form @submit.prevent="handleLogin">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" v-model="email" required />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" v-model="password" required />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" />
              <label for="remember"> Remember Me </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">
              Sign In
            </button>
          </div>
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <router-link to="/register" class="text-center">
          Cadastrar novo usuario
        </router-link>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    async handleLogin() {
      try {
        const response = await axios.post('/api/login', {
          email: this.email,
          password: this.password,
        });

        if (response.data.success) {
          // Armazenar o token no localStorage ou em cookies
          localStorage.setItem('token', response.data.token);

          // Redirecionar para a página inicial
          this.$router.push('/');
        } else {
          // Tratar erro de login
          alert('Login failed: ' + response.data.message);
        }
      } catch (error) {
        console.error('Login error:', error);
        alert('An error occurred during login.');
      }
    },
  },
};
</script>

<style scoped>
.login-container {
  max-width: 400px;
  margin: auto;
  padding: 20px;
}

.card-body {
  background-color: #f8f9fa;
  border-radius: 5px;
  padding: 20px;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.input-group-text {
  background-color: #e9ecef;
}

.icheck-primary input[type="checkbox"] {
  margin-top: 0.3rem;
}
</style>
