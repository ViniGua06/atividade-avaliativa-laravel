@extends("layouts.app")

@section("title", "Planes")

@section('styles')

    table {
        border-collapse: collapse;
        width: 100%;
    }

    tr, td, th {
        border: solid 1px black;
        padding: 1rem;
        text-align: center
    }

    tBody > tr:hover {
        background-color: rgba(0,0,0, 0.2   )
    }

    

    

@endsection

@section('content')


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
                        <td>{{ $plane->velocidade_maxima }}km/h</td>
                        <td>{{$plane->produzida}}</td>
                        <td>
                            <form action="{{ route('remove', $plane) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit">Remover</button>
                            </form>
                        </td>
                        <td> <a href="{{ route('formupdate', $plane->id) }}"><button>Editar</button></a></td>
                        
                   
                </tr>
         
            @endforeach
        </tbody>
    </table>

    

@endsection
