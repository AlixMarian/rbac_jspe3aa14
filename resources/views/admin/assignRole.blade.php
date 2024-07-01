@extends('mainLayout')

@section('title', 'Assign Role')

@section('page-content')
<div class="container-fluid">
    <div class="row ps-1">
        <div class="col bg-black text-light fs-5 text-start">
             Assign Role to {{ $user->name }}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('user.assignRole.submit', ['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="role" class="form-label">Select Role</label>
                    <select id="role" name="role" class="form-select">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assign Role</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('usertool') }}" class="link-dark">Back</a>
        </div>
    </div>
</div>
@endsection
