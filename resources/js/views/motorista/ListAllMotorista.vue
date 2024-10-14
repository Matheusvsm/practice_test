<template>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid card-outline">
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Motoristas</h3>
                            <div class="card-tools">
                                <router-link to="/motorista/add" class="btn btn-tool badge bg-success">
                                    Cadastrar
                                </router-link>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="mb-2">
                                <label for="items-per-page">Items por página:</label>
                                <select v-model="itemsPerPage" id="items-per-page" class="form-control" style="width: auto; display: inline;">
                                    <option v-for="num in [5, 10, 15, 20]" :key="num" :value="num">{{ num }}</option>
                                </select>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">ID</th>
                                        <th style="width: 20%">Nome</th>
                                        <th style="width: 30%">Email</th>
                                        <th>Data de Nascimento</th>
                                        <th style="width: 8%" class="text-center">CPF</th>
                                        <th style="width: 20%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(motorista, index) in paginatedMotoristas" :key="motorista.id">
                                        <td>{{ motorista.id }}</td>
                                        <td>{{ motorista.nome_motorista }}</td>
                                        <td>{{ motorista.email_motorista }}</td>
                                        <td>{{ motorista.data_nascimento_motorista }}</td>
                                        <td class="text-center">{{ motorista.cpf_motorista }}</td>
                                        <td class="project-actions text-right">
                                            <!-- <a class="btn btn-primary btn-sm" :href="'/motorista/' + motorista.id">
                                                <i class="fas fa-folder"></i> Visualizar
                                            </a> -->
                                            <a class="btn btn-info btn-sm" :href="'/motorista/' + motorista.id + '/edit'">
                                                <i class="fas fa-pencil-alt"></i> Editar
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="pagination">
                                <button :disabled="currentPage === 1" @click="currentPage--" class="page-link">«</button>
                                <span>Página {{ currentPage }} de {{ totalPages }}</span>
                                <button :disabled="currentPage === totalPages" @click="currentPage++" class="page-link">»</button>
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
    name: "ListAllMotorista",
    data() {
        return {
            motoristas: [], // Propriedade para armazenar os dados dos motoristas
            currentPage: 1,
            itemsPerPage: 5 // Número de itens por página
        };
    },
    computed: {
        totalPages() {
            return Math.ceil(this.motoristas.length / this.itemsPerPage);
        },
        paginatedMotoristas() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            return this.motoristas.slice(start, start + this.itemsPerPage);
        }
    },
    mounted() {
        this.fetchMotoristas(); 
    },
    methods: {
        async fetchMotoristas() {
            try {
                const token = localStorage.getItem('token');
                const response = await axios.get('/api/motoristas', {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });
                this.motoristas = response.data;
            } catch (error) {
                console.error('Erro ao buscar motoristas:', error);
            }
        }
    }
}
</script>

<style>
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}
.pagination button {
    border: none;
}
.pagination button:hover {
    background-color: #88888877;
    color: #fff; 
    border-radius: 50%;
}
</style>
