<template>
    <div class="register-box">
        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>
            <form @submit.prevent="register">
                <div class="input-group mb-3">
                    <input type="text" v-model="form.name" class="form-control" placeholder="name" required />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="email" v-model="form.email" class="form-control" placeholder="Email" required />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" v-model="form.password" class="form-control" placeholder="Password"
                        required />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" v-model="form.confirmPassword" class="form-control"
                        placeholder="Retype password" required />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" v-model="form.agreeTerms" required />
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Register
                        </button>
                    </div>
                </div>
            </form>
            <router-link to="/login" class="text-center">
                I already have a membership
            </router-link>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    
    name: "Register",
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
                confirmPassword: "",
                agreeTerms: false,
            },
        };
    },
    methods: {
        async register() {
            if (this.form.password !== this.form.confirmPassword) {
                alert("Passwords do not match");
                return;
            }

            if (!this.form.agreeTerms) {
                alert("You must agree to the terms");
                return;
            }

            try {
                const response = await axios.post('/api/register', {
                    name: this.form.name,
                    email: this.form.email,
                    password: this.form.password,
                    password_confirmation: this.form.confirmPassword,
                    
                });

                alert(response.data.message);
                this.$router.push('/login'); 
            } catch (error) {
                if (error.response && error.response.data.errors) {
                    alert("Erros de Validacao" + JSON.stringify(error.response.data.errors));
                } else {
                    alert("ocorreu um erro durante o registro");
                }
            }
        },
    },
};
</script>

<style scoped>
.register-box {
    width: 360px;
    margin: 7% auto;
}

.card-body {
    padding: 20px;
}

.input-group-text {
    background-color: #f4f4f4;
}

.btn {
    margin-top: 10px;
}
</style>