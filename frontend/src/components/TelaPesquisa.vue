<template>
    <div class="container">
        <div v-if="detalhesOn">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-12 mr-2 mt-2 ml-2 mb-2">
                    <v-table theme="dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="text-center"
                                style="padding: 10px">
                                    ID
                                </th>
                                <th class="text-center"
                                style="padding: 10px">
                                    Nome
                                </th>
                                <th class="text-center"
                                style="padding: 10px">
                                    Email
                                </th>
                                <th class="text-center"
                                style="padding: 10px">
                                    CPF
                                </th>
                                <th class="text-center"
                                style="padding: 10px">
                                    Perfil
                                </th>
                                <th class="text-center"
                                style="padding: 10px">
                                    Endereços
                                </th>
                                <th class="text-center"
                                style="padding: 10px">
                                    Período de Cadastro
                                </th>
                                <th class="text-center"
                                style="padding: 10px">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                            <tbody>
                                <tr v-for="cadastro in resultadosPesquisa"
                                :key="cadastro.id">
                                    <td class="text-center"
                                    style="padding: 10px">{{ cadastro.id }}</td>
                                    <td class="text-center"
                                    style="padding: 10px">{{ cadastro.nome }}</td>
                                    <td class="text-center"
                                    style="padding: 10px">{{ cadastro.email }}</td>
                                    <td class="text-center"
                                    style="padding: 10px">{{ cadastro.cpf }}</td>
                                    <td class="text-center"
                                    style="padding: 10px">{{ cadastro.perfil }}</td>
                                    <td class="text-center"
                                    style="padding: 10px">{{ cadastro.endereço }}</td>
                                    <td class="text-center"
                                    style="padding: 10px">{{ cadastro.created_at }}</td>
                                    <td class="text-center"
                                    style="padding: 10px">
                                        <v-btn type="button"
                                        color="danger"
                                        @click="remove(cadastro)"
                                        class="mr-2 mt-2 ml-2 mb-2">Deletar</v-btn>
                                    </td>
                                </tr>
                            </tbody>
                    </v-table>
                    <div class="row">
                        <div align="center" class="col-md-12 mt-3">
                            <v-btn type="button"
                            color="info"
                            @click="detalhesOn = false"
                            class="mr-2 mt-2 ml-2 mb-2">Fechar</v-btn>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 v-if="detalhesOn == false" align="center" class="mt-5">Criar Cadastro</h3>
        <div v-if="detalhesOn == false" class="row">
            <div class="col-md-2"></div>
            <div class="col-md-12">
                <div class="form-area">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nome</label>
                                <v-text-field
                                v-model="cadastro.nome"
                                label="Nome"></v-text-field>
                            </div>
                            <div class="col-md-6">
                                <label>CPF</label>
                                <v-text-field
                                v-model="cadastro.cpf"
                                type="number"></v-text-field>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Período de Cadastro</label>
                                <v-text-field
                                v-model="cadastro.created_at"
                                label="Período de Cadastro"></v-text-field>
                            </div>
                        </div>
                        <div class="row">
                            <div align="center" class="col-md-12 mt-3">
                                <v-btn type="button"
                                color="success"
                                @click="pesquisar(cadastro)">Pesquisar</v-btn>
                            </div>
                        </div>
                    </form>
                </div>
                <v-table theme="dark">
                    <thead>
                        <tr>
                            <th class="text-center"
                            style="padding: 10px">
                                ID
                            </th>
                            <th class="text-center"
                            style="padding: 10px">
                                Nome
                            </th>
                            <th class="text-center"
                            style="padding: 10px">
                                Email
                            </th>
                            <th class="text-center"
                            style="padding: 10px">
                                CPF
                            </th>
                            <th class="text-center"
                            style="padding: 10px">
                                Perfil
                            </th>
                            <th class="text-left">
                                Endereços
                            </th>
                            <th class="text-left">
                                Período de Cadastro
                            </th>
                            <th class="text-left">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cadastro in result"
                        :key="cadastro.id">
                            <td>{{ cadastro.id }}</td>
                            <td>{{ cadastro.nome }}</td>
                            <td>{{ cadastro.email }}</td>
                            <td>{{ cadastro.cpf }}</td>
                            <td>{{ cadastro.perfil }}</td>
                            <td>{{ cadastro.endereço }}</td>
                            <td>{{ cadastro.created_at }}</td>
                            <td>
                                <v-btn type="button"
                                color="info"
                                @click="pesquisar(cadastro)"
                                class="mr-2 mt-2 ml-2 mb-2">Detalhar</v-btn>
                                <v-btn type="button"
                                color="danger"
                                @click="remove(cadastro)"
                                class="mr-2 mt-2 ml-2 mb-2">Deletar</v-btn>
                            </td>
                        </tr>
                    </tbody>
                </v-table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'redaxios';

export default {
    name: 'Cadastro',
    data () {
        return {
            result: {},
            cadastro:{
                id: '',
                nome: '',
                email: '',
                cpf: '',
                perfil: '',
                endereço: '',
                created_at: ''
            },
            detalhesOn: false,
            resultadosPesquisa: {}
        }
    },
    created() {
        this.CadastroLoad();
    },
    mounted() {
        console.log("mounted() called.....");
    },
    methods: {
        CadastroLoad()
        {
            var page = "http://127.0.0.1:8000/api/cadastro";
            axios.get(page).then(
                ({data})=>{
                    console.log(data);
                    this.result = data;
                }
            );
        },
        details()
        {
            this.detalhesOn = true;
        },
        remove(cadastro)
        {
            var url = 'http://127.0.0.1:8000/api/cadastro/' + cadastro.id;
            axios.delete(url);
            alert("Cadastro deletado!");
            this.CadastroLoad();
        },
        pesquisar(cadastro)
        {
            var page = "http://127.0.0.1:8000/api/cadastro";
            axios.get(page).then(
                ({data})=>{
                    const filtrado = data.filter(
                        filtrado => filtrado.nome.toLowerCase().includes(
                            cadastro.nome.toLowerCase())
                        && filtrado.cpf.includes(
                            cadastro.cpf)
                        && filtrado.created_at.includes(
                            cadastro.created_at));
                    console.log(filtrado);
                    this.resultadosPesquisa = filtrado;
                }
            );
            this.detalhesOn = true;
        }
    }
}
</script>

<style scoped>
    .form-area{
        padding: 20px;
        margin-top: 20px;
        background-color: #0b0b0b;
        color: #fffcfc;
    }
    .bi-trash-fill{
        color:red;
        font-size: 18px;
    }
    .bi-pencil{
        color:green;
        font-size: 18px;
        margin-left: 20px;
    }
</style>