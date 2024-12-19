@extends('partials.layout')

@section('content')
<div class="card bg-base-200 w-2/5 shadow-xl mx-auto my-auto">
    <div class="card-body">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Email</span>
                </div>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="input input-bordered w-full @error('email') input-error @enderror" />
                <div class="label">
                    @error('email')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            </label>

            <div class="flex items-center justify-end mt-4">
                <input type="submit" class="btn btn-primary" value="{{ __('Send Password Reset Link') }}">
            </div>
        </form>
    </div>
</div>
@endsection
