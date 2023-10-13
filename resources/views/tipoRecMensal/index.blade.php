<x-layout title="Tipos de Receitas Mensais">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Cadastrar Nova Receita Mensal
    </button>
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>
    @endisset
    @isset($mensagemErro)
    <div class="alert alert-danger">
        {{$mensagemErro}}
    </div>
    @endisset
    <h2>Fixas</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome da Receita</th>
                <th scope="col">Dia da Receita</th>
                <th scope="col">Tipo</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipoRecFixa as $rec)
            <tr>
                <td>{{$rec->descricao_trf}}</td>
                <td>{{$rec->data_receita_trf}}</td>
                <td>Fixa</td>
                <td><?= $rec->id_ativo_trf == '1' ? "Ativo" : "Inativo" ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit" onclick="formEdit(1, '{{$rec->cod_tipo_rec_trf}}', '{{$rec->descricao_trf}}', '{{$rec->data_receita_trf}}')">
                        <i class="fa-regular fa-pen-to-square text-decondary"></i>
                    </button> |
                    <a href="<?= $rec->id_ativo_trf == '1' ? '/receitas-mensais/1/' . $rec->cod_tipo_rec_trf . '/0' : '/receitas-mensais/1/' . $rec->cod_tipo_rec_trf . '/1' ?>" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-ban text-light"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Variáveis</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome da Recesa</th>
                <th scope="col">Dia da Cobrança</th>
                <th scope="col">Tipo</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipoRecVar as $rec)
            <tr>
                <td>{{$rec->descricao_trv}}</td>
                <td>{{$rec->data_receita_trv}}</td>
                <td>Variável</td>
                <td><?= $rec->id_ativo_trv == '1' ? "Ativo" : "Inativo" ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit" onclick="formEdit(2, '{{$rec->cod_tipo_rec_trv}}', '{{$rec->descricao_trv}}', '{{$rec->data_receita_trv}}')">
                        <i class="fa-regular fa-pen-to-square text-decondary"></i>
                    </button> |
                    <a href="<?= $rec->id_ativo_trv == '1' ? '/receitas-mensais/2/' . $rec->cod_tipo_rec_trv . '/0' : '/receitas-mensais/2/' . $rec->cod_tipo_rec_trv . '/1' ?>" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-ban text-light"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal de criação -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar Nova Recesa Mensal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('receitas-mensais.create')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição *</label>
                            <input type="text" class="form-control" name="descricao" id="descricao" required>
                        </div>
                        <div class="mb-3">
                            <label for="dia" class="form-label">Dia da Receita *</label>
                            <input type="number" class="form-control" name="dia" id="dia" required>
                        </div>
                        <label for="tipo" class="form-label">Tipo de Receita *</label>
                        <select class="form-select" aria-label="Default select example" id="tipo" name="tipo" required>
                            <option selected value="">Selecione o Tipo de Receita</option>
                            <option value="1">Fixa</option>
                            <option value="2">Variável</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de edição -->
    <div class="modal fade" id="staticBackdropEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" id="formEdit">
                        @csrf
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição *</label>
                            <input type="text" class="form-control" name="descricao" id="descricaoEdit" required>
                        </div>
                        <div class="mb-3">
                            <label for="dia" class="form-label">Dia da Receita *</label>
                            <input type="number" class="form-control" name="dia" id="diaEdit" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>

<script>
    function formEdit(tipo, id, desc, dia) {
        let form = document.getElementById("formEdit");
        let descricao = document.getElementById("descricaoEdit");
        let inputDia = document.getElementById("diaEdit");
        form.action = '/receitas-mensais/' + tipo + '/' + id;
        descricao.value = desc;
        inputDia.value = dia;
    }
</script>