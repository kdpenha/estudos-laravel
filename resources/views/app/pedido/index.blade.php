@extends('app.layouts.basico')

@section('titulo', 'Pedido')
        
@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('pedido.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto;">
                    <table border="1" width='100%'>
                        <thead>
                            <tr>
                                <th>ID pedido</th>
                                <th>Cliente</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->id }}</td>
                                    <td>{{ $pedido->cliente_id }}</td>
                                    <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id])}}">Visualizar</a></td>
                                    <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id])}}">Editar</a></td>
                                    <td>
                                    <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $pedidos->appends($request)->links() }}

                    <p>Exibindo {{ $pedidos->count() }} registros de {{ $pedidos->total() }}</p>
            </div>
        </div>
    </div>

@endsection