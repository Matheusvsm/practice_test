<template>
    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid card-outline">
                <section class="content card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Motorista</h3>
                                    <div class="card-tools">
                                        <router-link to="/motorista" class="btn btn-danger">
                                            Cancelar
                                        </router-link>
                                    </div>
                                </div>
                                <form @submit.prevent="add" class="card-body">
                                    <div class="input-group mb-3">
                                        <input type="name" v-model="form.nome_motorista" class="form-control"
                                            placeholder="Nome do Motorista" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="cpf" v-model="form.cpf_motorista" class="form-control"
                                            placeholder="Cpf do Motorista" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-id-card"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Data de Nascimento:</label>
                                        <div class="input-group date">
                                            <input type="date" v-model="form.data_nascimento_motorista"
                                                class="form-control datetimepicker-input">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" v-model="form.email_motorista" class="form-control"
                                            placeholder="Email do Motorista" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
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
    name: "AddMotorista",
    data() {
        return {
            form: {
                nome_motorista: "",
                cpf_motorista: "",
                data_nascimento_motorista: "",
                email_motorista: ""
            },
        };
    },
    methods: {
        async add() {
            const formattedDate = this.formatDate(this.form.data_nascimento_motorista);
            this.form.data_nascimento_motorista = formattedDate;

            if (!this.form.nome_motorista) {
                alert("O nome do motorista é obrigatório.");
                return;
            }

            if (!this.form.cpf_motorista) {
                alert("O CPF do motorista é obrigatório.");
                return;
            }

            if (!this.form.data_nascimento_motorista) {
                alert("A data de nascimento do motorista é obrigatória.");
                return;
            }

            if (!this.form.email_motorista) {
                alert("O email do motorista é obrigatório.");
                return;
            }

            try {
                const token = localStorage.getItem('token');
                console.log('Dados do formulário: ', this.form);
                const response = await axios.post('/api/motoristas', this.form, {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });

                alert(response.data.message);
                this.$router.push('/motorista');
            } catch (error) {
                if (error.response && error.response.data.errors) {
                    alert("Erros de Validacao" + JSON.stringify(error.response.data.errors));
                } else {
                    alert("ocorreu um erro durante o registro" + JSON.stringify(error.response.data.errors));
                }
            }
        },
        formatDate(date) {
            if (!date) return '';

            const d = new Date(date);
            const year = d.getFullYear();
            const month = String(d.getMonth() + 1).padStart(2, '0');
            const day = String(d.getDate()).padStart(2, '0');

            return `${year}-${month}-${day}`;
        }
    },


}
</script>
<style lang="">

</style>