<x-layouts.guest>
    <div class="login-container">
        <div class="card login-card">
            <div class="card-body shadow">
                <h4 class="card-title text-center">@lang('Admin Login')</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">@lang('Email address :')</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="admin@admin">
                    </div>
                    <div class="form-group">
                        <label for="password">@lang('Password :')</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="*****">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">@lang('Login')</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.guest>