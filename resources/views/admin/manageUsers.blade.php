@extends('mainLayout')

@section('title','Manage Users')

@section('page-content')
<div class="container-fluid">
    <div class="row ps-1">
        <div class="col bg-black text-light fs-5 text-start">
             User Management
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped-columns table-hover table-primary fs-6">
                 <tr class="text-center">
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Full Name</th>
                    <th>Role</th>
                    <th>E-mail</th>
                    <th colspan="2">Actions</th>
                 </tr>
                 @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->userInfo->user_firstname.' '.$user->userInfo->user_lastname }}</td>
                        <td>
                            @if($user->roles->isNotEmpty())
                                {{ $user->roles->first()->name }}
                            @else
                                No Role Assigned
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.assignRole', ['id' => $user->id]) }}" title="Manage Selected User">
                            <button class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-wrench-adjustable-circle-fill" viewBox="0 0 16 16">
                            <path d="M6.705 8.139a.25.25 0 0 0-.288-.376l-1.5.5.159.474.808-.27-.595.894a.25.25 0 0 0 .287.376l.808-.27-.595.894a.25.25 0 0 0 .287.376l1.5-.5-.159-.474-.808.27.596-.894a.25.25 0 0 0-.288-.376l-.808.27z"/>
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m-6.202-4.751 1.988-1.657a4.5 4.5 0 0 1 7.537-4.623L7.497 6.5l1 2.5 1.333 3.11c-.56.251-1.18.39-1.833.39a4.5 4.5 0 0 1-1.592-.29L4.747 14.2a7.03 7.03 0 0 1-2.949-2.951M12.496 8a4.5 4.5 0 0 1-1.703 3.526L9.497 8.5l2.959-1.11q.04.3.04.61"/>
                            </svg>
                            Modify
                            </button>
                            </a>
                        </td>
                        <td class="text-center">
                            <form id="delete-user-{{ $user->id }}" action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                    </svg>
                                            Delete
                                    </button>
                            </form>
                        </td>
                    </tr>
                 @endforeach
                 <tr>
                    <td colspan="7">
                        {{ $users->links() }}
                    </td>
                 </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('dash') }}" class="link-dark">Back</a>
        </div>
    </div>
</div>
@endsection
