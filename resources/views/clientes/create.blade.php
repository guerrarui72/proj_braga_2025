@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Criar Cliente</h4>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{dd($clientes)}}; --}}


                        {{--  ficar a funcionar o windows allert --}}
                        @if (session('alert'))
                            <script>
                                alert('{{ session('alert') }}');
                            </script>
                        @endif

                        @if (session('alert'))
                            <script>
                                Swal.fire({
                                    title: 'Aviso!',
                                    text: '{{ session('alert') }}',
                                    icon: 'success', // tipos: 'success', 'error', 'warning', 'info', 'question'
                                    confirmButtonText: 'OK'
                                });
                            </script>
                        @endif

                        <form action="{{ route('clientes.store') }}" method="post">

                            @csrf

                            <table class="table  table-light">

                                <tr>
                                    <th scope="row">Nome:</th>
                                    <td><input type="text" name="nome"></td>

                                </tr>
                                <tr>
                                    <th scope="row">Morada:</th>
                                    <td><input type="text" name="morada"></td>

                                </tr>

                                <tr>
                                    <th scope="row">Telefone:</th>
                                    <td><input type="text" name="telefone"></td>

                                </tr>
                                <tr>
                                    <th scope="row">Email:</th>
                                    <td><input type="email" name="email"></td>

                                </tr>
                                <tr>
                                    <th scope="row">Data Nascimento:</th>
                                    <td><input type="date" name="data_nascimento"></td>

                                </tr>
                            </table>
                            <button type="submit" class="btn btn-primary">Gravar</button>
                            <button type="reset" class="btn btn-danger">Limpar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
