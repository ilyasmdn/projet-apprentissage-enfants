@extends('layouts.app')

@section('content')
    <div class="login-container">
        <div class="login-card">
            <div class="login-card-header">Connexion Administrateur</div>

            <div class="login-card-body">
                @if (session('error'))
                    <div class="message error">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}" class="login-form">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-input @error('email') input-error @enderror" id="email"
                            name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mot_de_passe" class="form-label">Mot de passe</label>
                        <input type="password" class="form-input @error('mot_de_passe') input-error @enderror"
                            id="mot_de_passe" name="mot_de_passe" required>
                        @error('mot_de_passe')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="button button-primary button-full">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
