@extends("layouts.app")

@section("title", "Planes")

@section('styles')

    table {
        border-collapse: collapse;
        min-width: 100%;
        color: rgba(116, 63, 145, 0.83);
        overflow-x: auto;
    }

    tr, td, th {
        border: solid 1px rgba(116, 63, 145, 0.83);
        padding: 1rem;
        text-align: center
    }

    tBody > tr:hover {
        background: rgba(116, 63, 145, 0.83);
        color: white;
    }

    tBody > tr:hover #remove-button {
        background: rgba(116, 63, 145, 1);
        color: white;
    }

    tBody > tr:hover #edit-button{
        background: rgba(116, 63, 145, 1);
        color: white;
    }


    table button {
        width: 100%;
        height: 100%;
        border: none;
        background: transparent;
        cursor: pointer;
    }

    .pag-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 2rem;
        gap: 1rem;
        width: 100%
    }

    .pag-container a {
        border: solid rgba(116, 63, 145, 0.83) 1px;
        border-radius: 50%;
        color: rgba(116, 63, 145, 0.83);
        height: 60px;
        width: 60px;
        display: grid;
        place-items: center;
    }

    .back {
        background: rgba(116, 63, 145, 0.83);   
        color: white;
        padding: 1rem 2rem;
        border-radius: 3rem;
        width: 7%;
        text-align: center;
    }
    
    .error-container {
        display: flex;
        flex-direction: column;
    }

    .error-container > h1 {
        font-weight: 500;
        color: rgba(116, 63, 145, 0.83)
    }

    @media(max-width: 450px) {
        main {
            margin: .6rem;
        }
    }

    #remove-button {
        color: rgba(116, 63, 145, 0.83);
    }

    #edit-button {
        color: rgba(116, 63, 145, 0.83);
    }
    


    

@endsection

@section('content')

    
    @if ($page > $links || $page <= 0)
    <div class="error-container">
        <h1>Nenhum Item encontrado</h1>
        <a class="back" href="{{route("page", $links)}}">Voltar</a>
    </div>

    
        
    @else
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Criação</th>
                    <th>Unidades Produzidas</th>
                    <th>Nação</th>
                    <th>Tipo da Aeronave</th>
                    <th>Velocidade Máxima</th>
                    <th>Ainda produzido?</th>
                </tr>
            </thead>
            <tbody>
                @foreach($planes as $plane) 
            
                    <tr>                             
                            <td>{{$plane->name}}</td>
                            <td>{{$plane->data_criacao}}</td>
                            <td>{{$plane->unidades_produzidas}}</td>
                            <td>{{$plane->nacao}}</td>
                            <td>{{$plane->tipo}}</td>
                            <td>{{$plane->velocidade_maxima}}km/h</td>
                            <td>@if ($plane->produzida == "true") Sim @else Não @endif</td>
                            <td>
                                <form action="{{ route('remove', $plane) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" id="remove-button">Remover</button>
                                </form>
                            </td>
                            <td> <a href="{{ route('formupdate', $plane->id) }}"><button id="edit-button">Editar</button></a></td>
                    </tr>
            
                @endforeach
            </tbody>
        </table>
    @endif
    

    <div class="pag-container">
        @for ($i = 0; $i < $links; $i++)
            @if ($page - 1 == $i)
                <a href="{{route("page", $i + 1)}}" style="background: rgba(116, 63, 145, 0.83); color: white">{{$i + 1}}</a>
            @else
                <a href="{{route("page", $i + 1)}}" >{{$i + 1}}</a>
            @endif
        @endfor
    </div>

    

@endsection
