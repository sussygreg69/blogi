@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-2/5 shadow-xl mx-auto my-auto">
        <div class="card-body">
            <h2 class="card-title">Edit Profile</h2>


            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')


            <form method="POST" action="{{ route('profile.update') }}" class="mt-8">
                @csrf
                @method('PATCH')

                <h3 class="text-lg font-semibold">Change Email</h3>

                <label class="form-control w-full mt-4">
                    <div class="label">
                        <span class="label-text">Current email</span>
                    </div>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                           class="input input-bordered w-full @error('email') input-error @enderror" />
                    <div class="label">
                        @error('email')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </label>

                <label class="form-control w-full mt-4">
                    <div class="label">
                        <span class="label-text">New Email</span>
                    </div>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                           class="input input-bordered w-full @error('email') input-error @enderror" />
                    <div class="label">
                        @error('email')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </label>


                <label class="form-control w-full mt-4">
                    <div class="label">
                        <span class="label-text">Confirm New Email</span>
                    </div>
                    <input type="email" name="email_confirmation"
                           class="input input-bordered w-full @error('email_confirmation') input-error @enderror" />
                    <div class="label">
                        @error('email_confirmation')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </label>


                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>


             <label class="form-control w-full mt-4">
                <div class="label">
                    <span class="label-text">Current Password</span>
                </div>
                <input type="password" name="current_password"
                       class="input input-bordered w-full @error('current_password') input-error @enderror" required />
                <div class="label">
                    @error('current_password')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            </label>

            <label class="form-control w-full mt-4">
                <div class="label">
                    <span class="label-text">New Password</span>
                </div>
                <input type="password" name="password"
                       class="input input-bordered w-full @error('password') input-error @enderror" />
                <div class="label">
                    @error('password')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            </label>


            <label class="form-control w-full mt-4">
                <div class="label">
                    <span class="label-text">Confirm New Password</span>
                </div>
                <input type="password" name="password_confirmation"
                       class="input input-bordered w-full @error('password_confirmation') input-error @enderror" />
                <div class="label">
                    @error('password_confirmation')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            </label>

            <div class="flex justify-end mt-4">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>


            <div class="mt-10">
                <h3 class="text-lg font-semibold text-error">Delete Account</h3>
                <p class="text-sm text-gray-500 mt-1">
                    Please confirm your password to delete your account. This action is irreversible.
                </p>

                <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?');">
                    @csrf
                    @method('DELETE')

                    <label class="form-control w-full mt-4">
                        <div class="label">
                            <span class="label-text">Confirm Password</span>
                        </div>
                        <input type="password" name="current_password" required
                               class="input input-bordered w-full @error('current_password') input-error @enderror" />
                        <div class="label">
                            @error('current_password')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <div class="flex justify-end mt-4">
                        <button type="submit" class="btn btn-error">Delete Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
