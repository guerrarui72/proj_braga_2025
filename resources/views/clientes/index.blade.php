@extends('layouts.app')

@section('content')


    <script>
        function confirma_eliminar(clienteNome) {
            // Exibe a caixa de confirmação
            return confirm('Tem certeza de que deseja deletar o cliente "' + clienteNome + '"?');
        }
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Listagem de clientes</h4>
                        <p><a href="{{ route('clientes.create') }}"><button type="button" class="btn btn-primary">Inserir Novo
                                    Cliente</button></a></p>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('alert'))
                            <script>
                                Swal.fire({
                                    title: 'Aviso!',
                                    text: "{{ session('alert') }}",
                                    icon: 'success', // tipos: 'success', 'error', 'warning', 'info', 'question'
                                    confirmButtonText: 'OK'
                                });
                            </script>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        {{-- {{dd($clientes)}}; --}}
                        <!-- Links de navegação de páginas -->
                        <div class="pagination">
                            {{ $clientes->links('pagination::bootstrap-5') }}
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" colspan=3></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <th scope="row">{{ $cliente->id }}</th>
                                        <td>{{ $cliente->nome }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td><a href="{{ route('clientes.show', $cliente->id) }}"><button type="button"
                                                    class="btn btn-success">Mostrar</button></a></td>
                                        <td><a href="{{ route('clientes.edit', $cliente->id) }}"><button type="button"
                                                    class="btn btn-warning">Editar</button></a></td>
                                        <td>

                                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                                @csrf <!-- Token de segurança CSRF -->
                                                @method('DELETE') <!-- Simula o método DELETE -->
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirma_eliminar('{{ $cliente->nome }}')">Eliminar</button>
                                            </form>



                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
