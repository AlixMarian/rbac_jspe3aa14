@extends('mainLayout')

@section('title', 'Assign Role')

@section('page-content')
<div class="container-fluid">
    <div class="card w-75 mb-3 mx-auto class">
        <div class="card-body">
            <div class="col bg-black text-light fs-5 text-start">
                Account Information
            </div>

            <div>
                <h6>User Name: {{ $user->name }}</h6>
                <h6>Full Name: {{$user->userInfo->user_firstname.' '.$user->userInfo->user_lastname}}</h6>
                <h6>Email: {{ $user->email }}</h6>
                <h6>Current Role: {{ $user->roles->first()->name }}</h6>
            </div>
            <form action="{{ route('user.assignRole.submit', ['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="col bg-black text-light fs-5 text-start">
                        Select new role to assign
                    </div>
                    <select id="role" name="role" class="form-select">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assign Role</button>
            </form>

            <div class="col">
                <a href="{{ route('usertool') }}" class="link-dark">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
