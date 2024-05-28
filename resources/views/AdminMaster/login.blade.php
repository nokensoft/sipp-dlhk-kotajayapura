
<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="shortcut icon" href="{{ asset('./assets/img/favicon.png') }}">
		<title>{{ $siteTitle .' -' . $siteDescription ?? '' }}</title>

		<!-- Core CSS -->
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
	</head>
	<body>
		<!-- App Start-->
		<div id="root">
			<!-- App Layout-->
			<div class="app-layout-blank flex flex-auto flex-col h-[100vh]">
                <div class="h-full flex flex-auto flex-col justify-between">
                    <main class="h-full">
                        <div class="page-container relative h-full flex flex-auto flex-col">
                            <div class="grid lg:grid-cols-3 h-full">
                                <div class="bg-no-repeat bg-cover py-6 px-16 flex-col justify-between hidden lg:flex" style="background-image: url('assets/img/others/auth-side-bg.jpg');">
                                    <div class="logo">
                                        <img src="{{asset('assets/img/logo/logo-dark-full.png')}}" alt="Logo SIPP DLHK">
                                    </div>
                                    <div>
                                        <div class="mb-6 flex items-center gap-4">
                                            {{-- <span class="avatar avatar-circle avatar-md border-2 border-white">
                                                <img class="avatar-img avatar-circle" src="{{asset('assets/img/avatars/thumb-10.jpg')}}" loading="lazy">
                                            </span> --}}
                                            <div class="text-white">
                                                <div class="font-semibold text-4xl">
                                                    {{ $siteTitle }}
                                                </div>
                                                {{-- <span class="opacity-80">CTO, Onward</span> --}}
                                            </div>
                                        </div>
                                        <p class="text-lg text-white opacity-80 uppercase">
                                            {{ $siteDescription }}
                                        </p>
                                    </div>
                                    <span class="text-white">Copyright © 2024
                                        <span class="font-semibold">- Powered by <a href="https://nokensoft.com" class="hover:underline" target="_blank">Nokensoft</a></span>
                                    </span>
                                </div>
                                <div class="col-span-2 flex flex-col justify-center items-center bg-white">
                                    <div class="xl:min-w-[450px] px-8">
                                        <div class="mb-8">
                                            <h3 class="mb-1">Login</h3>
                                            <p>Silahkan masukan nama pengguna dan kata sandi adminmaster!</p>
                                        </div>
                                        <div x-data="{isLogin: false}">
                                            <div class="flex justify-center" x-show="isLogin">
                                                <svg aria-hidden="true" class="w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-container vertical">
                                                    <div class="form-item vertical">
                                                        <label class="form-label mb-2">Nama Pengguna</label>
                                                        <div>
                                                            <input
                                                                class="input"
                                                                type="text"
                                                                name="username"
                                                                autocomplete="off"
                                                                placeholder="User Name"
                                                                value=""
                                                            >
                                                        </div>
                                                        @error('username')
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-item vertical">
                                                        <label class="form-label mb-2">Kata Sandi</label>
                                                        <div>
                                                            <span class="input-wrapper">
                                                                <input
                                                                    class="input pr-8"
                                                                    type="password"
                                                                    name="password"
                                                                    autocomplete="off"
                                                                    placeholder="Password"
                                                                    value=""
                                                                >
                                                                <div class="input-suffix-end">
                                                                    <span class="cursor-pointer text-xl">
                                                                        <svg
                                                                            stroke="currentColor"
                                                                            fill="none"
                                                                            stroke-width="2"
                                                                            viewBox="0 0 24 24"
                                                                            aria-hidden="true"
                                                                            height="1em"
                                                                            width="1em"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                        >
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                            </span>
                                                            @error('password')
                                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-between mb-6">
                                                        <label class="checkbox-label mb-0">
                                                            <input class="checkbox" name="remember" type="checkbox" value="true" checked>
                                                            <span class="ltr:ml-2 rtl:mr-2">Remember Me</span>
                                                        </label>
                                                        <a class="text-primary-600 hover:underline" href="forgot-password-side.html">Lupa Kata Sandi?</a>
                                                    </div>
                                                    <button @click="isLogin = true" class="btn btn-solid w-full" type="submit">Masuk</button>
                                                    <div class="mt-4 text-center">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
			</div>
		</div>

		<!-- Core Vendors JS -->
		<script src="{{asset('assets/js/vendors.min.js')}}"></script>

		<!-- Other Vendors JS -->

		<!-- Page js -->

		<!-- Core JS -->
		<script src="{{asset('assets/js/app.min.js')}}"></script>
	</body>

</html>
