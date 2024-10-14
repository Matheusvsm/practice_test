<template>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid card-outline">
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Transportadora</h3>
                            <div class="card-tools">

                                <router-link to="/transportadora/add" class="btn btn-tool badge bg-success">
                                    Cadastrar
                                </router-link>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="mb-2">
                                <label for="items-per-page" class="ml-2">Items por página:</label>
                                <select v-model="itemsPerPage" id="items-per-page" class="form-control"
                                    style="width: auto; display: inline;">
                                    <option v-for="num in [5, 10, 15, 20]" :key="num" :value="num">{{ num }}</option>
                                </select>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">Codigo</th>
                                        <th style="width: 20%">Nome</th>
                                        <th style="width: 30%">CNPJ</th>
                                        <th>STATUS</th>
                                        <th style="width: 20%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(transportadora, index) in paginatedTransportadora"
                                        :key="transportadora.id">
                                        <td>{{ transportadora.id }}</td>
                                        <td>{{ transportadora.nome_transportadora }}</td>
                                        <td>{{ transportadora.cnpj_transportadora }}</td>
                                        <td>
                                            <span
                                                :class="transportadora.status_transportadora === 1 ? 'badge bg-success' : 'badge bg-danger'">
                                                {{ transportadora.status_transportadora === 1 ? 'Ativa' : 'Inativa' }}
                                            </span>

                                        </td>
                                        <td class="project-actions text-right">
                                            <!-- <a class="btn btn-primary btn-sm"
                                                :href="'/transportadora/' + transportadora.id">
                                                <i class="fas fa-folder"></i> Visualizar
                                            </a> -->
                                            <a class="btn btn-info btn-sm"
                                                :href="'/transportadora/' + transportadora.id + '/edit'">
                                                <i class="fas fa-pencil-alt"></i> Editar
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="pagination">
                                <button :disabled="currentPage === 1" @click="currentPage--"
                                    class="page-link">«</button>
                                <span>Página {{ currentPage }} de {{ totalPages }}</span>
                                <button :disabled="currentPage === totalPages" @click="currentPage++"
                                    class="page-link">»</button>
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
    name: "ListAllTransportadora",
    data() {
        return {
            transportadora: [],
            currentPage: 1,
            itemsPerPage: 5
        };
    },
    computed: {
        totalPages() {
            return Math.ceil(this.transportadora.length / this.itemsPerPage);
        },
        paginatedTransportadora() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            return this.transportadora.slice(start, start + this.itemsPerPage);
        }
    },
    mounted() {
        this.fetchTransportadora();
    },
    methods: {
        async fetchTransportadora() {
            try {
                const token = localStorage.getItem('token');
                const response = await axios.get('/api/transportadoras', {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });
                this.transportadora = response.data;
                console.log(this.transportadora);
            } catch (error) {
                console.error('Erro ao buscar transportadora:', error);
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
