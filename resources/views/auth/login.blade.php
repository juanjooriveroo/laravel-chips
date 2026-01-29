<x-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)] flex items-center justify-center">
        <div class="hero-content flex-col w-full max-w-md">
            <div class="card w-full bg-base-100 mx-auto">
                <div class="card-body">
                    <h1 class="text-3xl font-bold text-center mb-6">Welcome Back</h1>

                    <form method="POST" action="/login">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email"
                                   name="email"
                                   placeholder="mail@example.com"
                                   value="{{ old('email') }}"
                                   class="input input-bordered w-full mt-1 @error('email') input-error @enderror"
                                   required autofocus>
                            @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password"
                                   name="password"
                                   placeholder="••••••••"
                                   class="input input-bordered w-full mt-1 @error('password') input-error @enderror"
                                   required>
                            @error('password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-control mt-2">
                            <label class="label cursor-pointer justify-start">
                                <input type="checkbox" name="remember" class="checkbox">
                                <span class="label-text ml-2">Remember me</span>
                            </label>
                        </div>

                        <div class="form-control mt-6">
                            <button type="submit" class="btn btn-primary btn-sm w-full">Sign In</button>
                        </div>
                    </form>

                    <div class="divider">OR</div>
                    <p class="text-center text-sm">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="link link-primary">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
