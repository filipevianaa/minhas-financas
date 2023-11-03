<x-layout title="Despesas Mensais de Valor Fixo">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Cadastrar Nova Despesa
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
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome da Despesa</th>
                <th scope="col">Valor</th>
                <th scope="col">Tipo</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipoDespFixa as $desp)
            <tr>
                <td>{{$desp->descricao_tdf}}</td>
                <td>
                    @if(isset($desp->valor_dfv))

                    {{$desp->valor_dfv}}

                    @else
                    adicionar valor
                    @endif
                </td>
                <td>Fixa</td>
                <td><?= $desp->id_ativo_tdf == '1' ? "Ativo" : "Inativo" ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit" onclick="formEdit(1, '{{$desp->cod_tipo_desp_tdf}}', '{{$desp->descricao_tdf}}')">
                        <i class="fa-regular fa-pen-to-square text-decondary"></i>
                    </button> |
                    <a href="<?= $desp->id_ativo_tdf == '1' ? '/despesas-mensais/' . $desp->cod_tipo_desp_tdf . '/0' : '/despesas-mensais/' . $desp->cod_tipo_desp_tdf . '/1' ?>" class="btn btn-sm btn-danger">
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar Nova Despesa Mensal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('despesas-mensais.create')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição *</label>
                            <input type="text" class="form-control" name="descricao" id="descricao" required>
                        </div>
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
    function formEdit(tipo, id, desc) {
        let form = document.getElementById("formEdit");
        let descricao = document.getElementById("descricaoEdit");
        let inputDia = document.getElementById("diaEdit");
        form.action = '/despesas-mensais/'+ id;
        descricao.value = desc;
    }
</script>