<template lang="">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid card-outline">
                <section class="content card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Editar Transportadora</h3>
                                    <div class="card-tools">
                                        <router-link to="/transportadora" class="btn btn-danger">
                                            Cancelar
                                        </router-link>
                                    </div>
                                </div>
                                <form @submit.prevent="update" class="card-body">
                                    <div class="input-group mb-3">
                                        <input type="text" v-model="form.nome_transportadora" class="form-control"
                                            placeholder="Nome da transportadora" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" v-model="form.cnpj_transportadora" class="form-control"
                                            placeholder="CNPJ da Transportadora" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-id-card"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success float-right">
                                                Salvar
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
export default {
    name: "EditTransportadora",
    data() {
        return {
            form: {
                id: null, // ID da transportadora
                nome_transportadora: '',
                cnpj_transportadora: ''
            }
        };
    },
    mounted() {
        // Carregar os dados existentes da transportadora usando o ID da URL, por exemplo
        this.getTransportadora();
    },
    methods: {
        getTransportadora() {
            const id = this.$route.params.id;
            const token = localStorage.getItem('token');

            axios.get(`/api/transportadoras/${id}`, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
                .then(response => {
                    this.form = response.data;
                })
                .catch(error => {
                    console.error('Erro ao carregar transportadora:', error);
                });
        },
        update() {
            const token = localStorage.getItem('token');
            axios.put(`/api/transportadoras/${this.form.id}`, this.form, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
                .then(response => {

                    this.$router.push('/transportadora');
                    alert('Transportadora atualizada com sucesso!');
                })
                .catch(error => {
                    console.error('Erro ao atualizar transportadora:', error);
                });
        }
    }
};
</script>

<style lang="">
/* Adicione estilos, se necessário */
</style>
