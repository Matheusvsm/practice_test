<template>
    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid card-outline">
                <section class="content card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Transportadora</h3>
                                    <div class="card-tools">
                                        <router-link to="/transportadora" class="btn btn-danger">
                                            Cancelar
                                        </router-link>
                                    </div>
                                </div>
                                <form @submit.prevent="add" class="card-body">
                                    <div class="input-group mb-3">
                                        <input type="name" v-model="form.nome_transportadora" class="form-control"
                                            placeholder="Nome da transportadora" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="cpf" v-model="form.cnpj_transportadora" class="form-control"
                                            placeholder="Cnpj da Transportadora" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-id-card"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success float-right">
                                                Cadastrar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    name: "AddTransportadora",
    data() {
        return {
            form: {
                nome_transportadora: "",
                cnpj_transportadora: "",
            },
        };
    },
    methods: {
        async add() {

            try {
                const token = localStorage.getItem('token');
                console.log('Dados do formulário: ', this.form);
                const response = await axios.post('/api/transportadoras', this.form, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            });

                alert(response.data.message);
                this.$router.push('/transportadora');
            } catch (error) {
                if (error.response && error.response.data.errors) {
                    alert("Erros de Validacao" + JSON.stringify(error.response.data.errors));
                } else {
                    alert("ocorreu um erro durante o registro" + JSON.stringify(error.response.data.errors));
                }
            }
        },
    },

}
</script>
<style lang="">

</style>