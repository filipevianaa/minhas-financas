<x-layout title="Tipos de Despesas Mensais">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Cadastrar Nova Despesa Mensal
    </button>
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>
    @endisset
    <h2>Fixas</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome da Despesa</th>
                <th scope="col">Dia da Cobrança</th>
                <th scope="col">Tipo</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipoDespFixa as $desp)
            <tr>
                <td>{{$desp->descricao_tdf}}</td>
                <td>{{$desp->data_cobranca_tdf}}</td>
                <td>Fixa</td>
                <td><?= $desp->id_ativo_tdf == '1' ? "Ativo" : "Inativo" ?></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Variáveis</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome da Despesa</th>
                <th scope="col">Dia da Cobrança</th>
                <th scope="col">Tipo</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipoDespVar as $desp)
            <tr>
                <td>{{$desp->descricao_tdv}}</td>
                <td>{{$desp->data_cobranca_tdv}}</td>
                <td>Variável</td>
                <td><?= $desp->id_ativo_tdv == '1' ? "Ativo" : "Inativo" ?></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
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
                        <div class="mb-3">
                            <label for="dia" class="form-label">Dia da Cobrança *</label>
                            <input type="number" class="form-control" name="dia" id="dia" required>
                        </div>
                        <label for="tipo" class="form-label">Tipo de Despesa *</label>
                        <select class="form-select" aria-label="Default select example" id="tipo" name="tipo" required>
                            <option selected value="">Selecione o Tipo de Despesa</option>
                            <option value="1">Fixa</option>
                            <option value="2">Variável</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>