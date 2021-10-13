@extends('pub_theme::layouts.small',['title'=>'Login'])

{{-- @title('Login') --}}
@section('small-content')
    <form action="{{ route('login') }}" method="POST" class="w-full">
        @csrf
        <div class="form-group">
            <label for="handle">email</label>
            <input type="text" id="email" name="email" required class="form-control" />

        </div>
        <div class="form-group">
            <label for="passwd">password</label>
            <input type="password" id="password" name="password" required class="form-control" />

        </div>

        <div class="form-group">
            <label>
                <input name="remember" type="checkbox" value="1">
                Remember login
            </label>
        </div>

        <button type="submit" class="w-full button button-primary mb-4">Login</button>

    </form>
@endsection

@section('small-content-after')
    <a href="{{-- route('password.forgot') --}}" class="block text-center text-lio-700">Forgot your password?</a>
@endsection
