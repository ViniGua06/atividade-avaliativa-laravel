@extends("layouts.app")

@section("title", "Update")

@section("styles")

    form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    form > h1 {
        text-align: center;
        color: rgba(116, 63, 145, 0.83);
        font-weight: 500
    }

    input {
        outline: none;
    }

    .container {
        margin: 0 auto;
        width: 50%;
        padding-inline: 13rem;
        border: solid rgba(0,0,0,0.5) 1px;
        height: 100%;
        padding-block: 2rem
    }

@endsection

@section("content")

<div class="container">
        <form action="{{ route('updatePlane', $plane) }}" method="POST">

        @csrf
        @method("PUT")

        <h1>Cadastro de Aeronave</h1>

        <label>Nome</label>
        <input type="text" name="name" value="{{ $plane->name }}" required>

        <label>Unidades Produzidas</label>
        <input type="number" name="unidades" value="{{ $plane->unidades_produzidas }}" required>

        <label>Data Criação</label>
        <input type="date" name="data" value="{{ $plane->data_criacao }}" required>

        <label>Nação</label>
        <input type="text" name="nacao" value="{{ $plane->nacao }}" required>

        <label>Tipo da Aeronave</label>
        <select name="tipo" value="{{ $plane->tipo }}" required>
            <option value="">Selecione</option>
            <option value="comercial">Comercial</option>
            <option value="caca">Caça</option>
            <option value="bombardeiro">Bombardeiro</option>
        </select>

        <label>Velocidade Máxima</label>
        <input type="number" step="0.01" name="velocidade" value="{{ $plane->velocidade_maxima }}" required>

        <label>Ainda produzido?</label>
        <select name="produzido" id="" value="{{ $plane->produzida }}" required>
            <option value="">Selecione</option>
            <option value="true">Sim</option>
            <option value="false">Não</option>
        </select>



        <input type="submit">
        </form>
    </div>

@endsection