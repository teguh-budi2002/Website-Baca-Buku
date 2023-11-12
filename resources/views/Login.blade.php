<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "blue-primary": "#54ADFF",
                        "gray-primary": "#F9F9F9",
                    },
                },
            },
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        *,
        html,
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Roboto Condensed', sans-serif;
        }

        .login_page {
            background-image: url('{{ asset('img/bg-login.png') }}');
            z-index: 1;
        }

    </style>
</head>

<body>
    <main class="login_page w-full h-full min-h-screen flex justify-center items-center relative">
        <div class="md:w-2/6 w-11/12 h-auto bg-white shadow-lg rounded-md p-4 relative">
            <div
                class="box_design md:block hidden absolute -rotate-6 -left-3 bg-gradient-to-tr from-violet-500 -z-[10] to-blue-primary w-[535px] h-[285px] shadow-lg rounded-md">
            </div>
            <p class="text-center text-2xl font-bold text-[#535353]">LOGIN DASHBOARD</p>
            <div class="border border-slate-100 mt-4 w-3/4 mx-auto"></div>
            <form action="{{ Route('login.process') }}" method="POST">
                @csrf
                <div class="mb-3 mt-5">
                    @error('username')
                    <div class="bg-rose-400 rounded w-full h-auto p-0.5 px-4 mb-3" role="alert">
                        <p class="text-white text-sm capitalize">{{ $message }}</p>
                    </div>
                    @enderror
                    <div class="form_group relative">
                        <input type="text" id="username" name="username"
                            class="block px-2.5 pb-2.5 pt-1 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-400 appearance-none focus:outline-none focus:ring-0 focus:border-blue-primary peer"
                            placeholder=" " />
                        <label for="username"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Username</label>
                    </div>
                </div>
                <div class="mb-3">
                    @error('password')
                    <div class="bg-rose-400 rounded w-full h-auto p-0.5 px-4 mb-3" role="alert">
                        <p class="text-white text-sm capitalize">{{ $message }}</p>
                    </div>
                    @enderror
                    <div class="form_group relative">
                        <input type="password" id="password" name="password"
                            class="block px-2.5 pb-2.5 pt-1 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-400 appearance-none focus:outline-none focus:ring-0 focus:border-blue-primary peer"
                            placeholder=" " />
                        <label for="password"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Password</label>
                    </div>
                </div>
                <div class="remember_me flex items-center space-x-2">
                    <input type="checkbox" name="remember_me" id="remember_me" class="checkbox checkbox-xs" />
                    <label for="remember_me" class="text-sm text-slate-500">Ingat saya?</label>
                </div>
                <div class="btn_submit text-center mt-10">
                    <button
                        class="md:w-auto w-full py-2.5 px-16 rounded-md bg-blue-primary shadow-md text-white font-semibold">LOGIN</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
