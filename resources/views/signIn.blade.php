<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/app-Fh9H8IDW.css">
    <title>Document</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="h-screen">
    <div class="container mx-auto flex flex-col justify-center items-center h-screen">
        <h3 class="text-2xl">Sign In</h3>

        <form action="{{ URL::to('/signin') }}" method="POST" class="card w-full max-w-md">
            @csrf
            <div class="card-body">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Email</span>
                    </div>
                    <input type="text" name="email" class="input input-bordered w-full " value="{{ old('email') }}"/>
                    <div class="label">
                        @error("email")

                        <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </label>

                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Password</span>
                    </div>
                    <input type="password" name="password" class="input input-bordered w-full " />
                    <div class="label">
                        <span class="label-text-alt"></span>
                    </div>
                </label>

                <button class="btn btn-primary w-full">Log In</button>
            </div>
        </form>
    </div>
</body>

</html>
