@extends('layouts.app')

@section('content')
<div class="container-fluid mt--7">

    <div class="row mb-4">
        <div class="col">
            <h2 class="mb-0">Usuários</h2>
            <p class="text-sm text-muted">
                Gerencie os perfis de usuários
            </p>
        </div>

        <div class="col text-right">
            <a href="{{ route('passwords.register') }}" class="btn btn-info btn-round">
                <i class="tim-icons icon-simple-add"></i>
                Novo usuário
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body p-0">

            <table class="table table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th>Criado em</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>

                <tbody>

                @forelse ($users as $user)
                    <tr>

                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>

                        <td>
                            @if($user->role == 'admin')
                                <span class="badge badge-danger">Admin</span>
                            @elseif($user->role == 'usuario')
                                <span class="badge badge-info">Usuário</span>
                            @else
                                <span class="badge badge-secondary">Visitante</span>
                            @endif
                        </td>

                        <td>{{ $user->created_at->format('d/m/Y') }}</td>

                        <td class="text-right">

                            <a 
                                href="{{ route('users.edit', $user->id) }}"
                                class="btn btn-sm btn-primary"
                            >
                                Editar
                            </a>

                            <form 
                                action="{{ route('users.destroy', $user->id) }}"
                                method="POST"
                                style="display:inline"
                            >
                                @csrf
                                @method('DELETE')

                                <button 
                                    type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Deseja excluir este usuário?')"
                                >
                                    Excluir
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4">
                            Nenhum usuário encontrado.
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection