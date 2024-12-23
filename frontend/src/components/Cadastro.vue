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
                            </tr>
                        </thead>
                        <tbody>
                            <td class="text-center"
                                style="padding: 10px">{{ cadastroPedido.id }}</td>
                            <td class="text-center"
                                style="padding: 10px">{{ cadastroPedido.nome }}</td>
                            <td class="text-center"
                                style="padding: 10px">{{ cadastroPedido.email }}</td>
                            <td class="text-center"
                                style="padding: 10px">{{ cadastroPedido.cpf }}</td>
                            <td class="text-center"
                                style="padding: 10px">{{ cadastroPedido.perfil }}</td>
                            <td class="text-center"
                                style="padding: 10px">{{ cadastroPedido.endereço }}</td>
                            <td class="text-center"
                                style="padding: 10px">{{ cadastroPedido.created_at }}</td>
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
                    <form @submit.prevent="save" id="check-register-form">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nome</label>
                                <v-text-field
                                v-model="cadastro.nome"
                                label="Nome"
                                required></v-text-field>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <v-text-field
                                v-model="cadastro.email"
                                label="Email"
                                required></v-text-field>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>CPF</label>
                                <v-text-field
                                v-model="cadastro.cpf"
                                type="number"
                                required></v-text-field>
                            </div>
                            <div class="col-md-6">
                                <label>Perfil</label>
                                <v-select
                                v-model="cadastro.perfil"
                                :items="['ADM', 'USER']"
                                required></v-select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Endereços</label>
                                <v-text-field
                                v-model="cadastro.endereço"
                                label="Endereços"
                                required></v-text-field>
                            </div>
                        </div>
                        <div class="row">
                            <div align="center" class="col-md-12 mt-3">
                                <v-btn type="submit" color="success" form="check-register-form">
                                    Salvar
                                </v-btn>
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
                            <th class="text-center"
                            style="padding: 10px">
                                Endereços
                            </th>
                            <th class="text-center"
                            style="padding: 10px">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cadastro in result"
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
                            style="padding: 10px">
                                <v-btn type="button"
                                color="info"
                                @click="details(cadastro)"
                                class="mr-2 mt-2 ml-2 mb-2">Detalhar</v-btn>
                                <v-btn type="button"
                                color="info"
                                @click="edit(cadastro)"
                                class="mr-2 mt-2 ml-2 mb-2">Editar</v-btn>
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
                endereço: ''
            },
            detalhesOn: false,
            cadastroPedido:
            {
                id: '',
                nome: '',
                email: '',
                cpf: '',
                perfil: '',
                endereço: '',
                created_at: ''
            }
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
        save()
        {
            const cpfUsado = this.result.find(
                cpfUsado => cpfUsado.cpf === this.cadastro.cpf) ?? false;
            if (this.cadastro.cpf.length != 11)
            {
                alert("Um CPF precisa ter 11 digitos!");
            }
            else if (cpfUsado !== false && this.cadastro.id !== cpfUsado.id)
            {
                alert("Esse CPF já existe!")
            }
            else if (this.cadastro.id == '')
            {
                this.saveData();
            }
            else
            {
                this.updateData();
            }
        },
        saveData()
        {
            axios.post("http://127.0.0.1:8000/api/cadastro", this.cadastro).then(
                ({data})=>{
                    this.CadastroLoad();
                    this.cadastro.nome = '';
                    this.cadastro.email = '';
                    this.cadastro.cpf = '';
                    this.cadastro.perfil = '';
                    this.cadastro.endereço = '';
                    this.cadastro.id = '';
                    alert("Cadastro criado!");
                }
            )
        },
        edit(cadastro)
        {
            this.cadastro = cadastro;
        },
        details(cadastro)
        {
            this.detalhesOn = true;
            this.cadastroPedido = cadastro;
        },
        updateData()
        {
            var editrecords = 'http://127.0.0.1:8000/api/cadastro/'+ this.cadastro.id;
            axios.put(editrecords, this.cadastro).then(
                ({data})=>{
                    this.cadastro.nome = '';
                    this.cadastro.email = '';
                    this.cadastro.cpf = '';
                    this.cadastro.perfil = '';
                    this.cadastro.endereço = '';
                    this.cadastro.id = '';
                    alert("Cadastro atualizado!");
                    this.CadastroLoad();
                }
            );
        },
        remove(cadastro)
        {
            var url = 'http://127.0.0.1:8000/api/cadastro/' + cadastro.id;
            axios.delete(url);
            alert("Cadastro deletado!");
            this.CadastroLoad();
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