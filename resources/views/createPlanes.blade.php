@extends("layouts.app")

@section("title", "Create Plane")

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

    @media(max-width: 450px) {
        .container {
            padding-inline: 1rem;
            width: 100%;
        }

        main {
            margin: 0;
        }
    }

    @media (min-width: 451px) and (max-width: 768px) {
        .container {
            padding-inline: 1rem;
            width: 80%;
            margin-top: 5vh;
        }

        main {
            margin: 0;
        }
    }

    @media (min-width: 769px) and (max-width: 1250px) {
        .container {
            padding-inline: 1rem;
            width: 50%;
            margin-top: 5vh;
        }

        main {
            margin: 0;
        }
    }

@endsection

@section("content")

    <div class="container">
        <form action="{{ route('createPlanes') }}" method="POST">

        @csrf

        <h1>Cadastro de Aeronave</h1>

        <label>Nome</label>
        <input type="text" name="name" required>

        <label>Unidades Produzidas</label>
        <input type="number" name="unidades" required>

        <label>Data Criação</label>
        <input type="date" name="data" required>

        <label>Nação</label>
        <input type="text" name="nacao" required>

        <label>Tipo da Aeronave</label>
        <select name="tipo" required>
            <option value="">Selecione</option>
            <option value="comercial">Comercial</option>
            <option value="caca">Caça</option>
            <option value="bombardeiro">Bombardeiro</option>
        </select>

        <label>Velocidade Máxima</label>
        <input type="number" step="0.01" name="velocidade" required>

        <label>Ainda produzido?</label>
        <select name="produzido" id="" required>
            <option value="">Selecione</option>
            <option value="true">Sim</option>
            <option value="false">Não</option>
        </select>



        <input type="submit">
        </form>
    </div>

    

@endsection