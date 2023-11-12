<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website Perpustakan | @yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *,
        html,
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Roboto Condensed', sans-serif;
        }

    </style>
</head>

<body>
    <header>
        <div class="w-full flex justify-center py-8">
            <div class="w-2/3 flex items-center space-x-4">
                <img src="https://source.unsplash.com/random/?city,night" class="w-28 h-12" alt="logo_web">
                <p class="text-teal-800 text-4xl font-bold tracking-widest uppercase">Kampung Lali Gadget</p>
            </div>
        </div>
    </header>
    <nav>
        <div class="py-2.5 bg-green-800 flex justify-center">
            <div class="item_navbar w-full flex justify-center text-white text-sm">
                <div class="w-2/3 space-x-10">
                    <details class="dropdown">
                        <summary class="m-1 cursor-pointer">Kategori</summary>
                        <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded w-52">
                            <li>
                                <a class="text-slate-600">E-Modul</a>
                            </li>
                            <li>
                                <a class="text-slate-600">Pendidikan</a>
                            </li>
                        </ul>
                    </details>
                    <a href="/">Beranda</a>
                    <a class="">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="carousel__main">
        <div class="carousel w-full max-h-[600px]">
            <div id="slide1" class="carousel-item relative w-full">
                <img src="{{ asset('img/Slider Image/img_slider1.jpeg') }}" class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide4" class="btn btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>

                    </a>
                    <a href="#slide2" class="btn btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </a>
                </div>
            </div>
            <div id="slide2" class="carousel-item relative w-full">
                <img src="{{ asset('img/Slider Image/img_slider2.jpeg') }}" class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide1" class="btn btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </a>
                    <a href="#slide3" class="btn btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>
            <div id="slide3" class="carousel-item relative w-full">
                <img src="{{ asset('img/Slider Image/img_slider3.jpeg') }}" class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide2" class="btn btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </a>
                    <a href="#slide4" class="btn btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>
            <div id="slide4" class="carousel-item relative w-full">
                <img src="{{ asset('img/Slider Image/img_slider4.jpeg') }}" class="w-full" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide3" class="btn btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </a>
                    <a href="#slide1" class="btn btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <main class="w-full h-full min-h-screen">
        @yield('content')
    </main>
    <footer>
        <div class="upper_footer text-center w-full h-auto">
            <div class="p-1 flex justify-center">
                <div class="w-2/4">
                    <img src="{{ asset('img/direktur_sma_img.jpeg') }}" class="w-28 h-28 rounded-full mx-auto border-4 border-solid border-blue-500" alt="profile_img">
                    <p class="mt-8 text-slate-500 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse atque ab non tempore expedita doloremque, molestias iste sit impedit veniam officia eveniet labore aperiam nemo blanditiis voluptates temporibus reprehenderit in! Dicta, nam dolore dolorum dolorem velit quaerat aspernatur autem quo! Ad eligendi in magnam. Itaque dolorum similique provident unde aspernatur modi animi doloribus, voluptatem laborum doloremque nostrum, magnam, accusantium quae a ducimus sequi aut illum debitis reiciendis voluptas. Alias distinctio vero nihil in ducimus rem non exercitationem? Soluta praesentium vitae quas voluptate quaerat cum sunt, at qui esse suscipit nisi optio iste modi, quae rerum laborum. Non quos temporibus tempora.</p>
                    <div class="w-2/5 mx-auto border border-slate-300 border-solid mt-8"></div>
                    <div class="detail_name">
                        <p class="font-semibold mt-8">Winner Jihad Akbar</p>
                        <p class="text-xs text-slate-600 font-light">Plt. Direktur SMA</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_footer border-t-2 border-blue-500 border-solid mt-5 bg-slate-100">
            <div class="flex justify-center">
                <div class="w-2/3 h-auto p-8">
                    <img src="https://source.unsplash.com/random/?city,night" class="w-28 h-10" alt="logo">
                    <div class="description text-slate-500 font-light text-sm space-y-6 mt-10">
                        <p class="">
                            <i class="fa-solid fa-city mr-4"></i>
                            Kampung Lali Gadget
                        </p>
                        <a href="https://wa.me/+62217694140" class="tracking-widest block">
                            <i class="fa-solid fa-phone mr-4"></i>
                            +62 21-7694140
                        </a>
                        <p class="">
                            <i class="fa-regular fa-clock mr-4"></i>
                            Pelayanan Senin-Jumat pukul 08:00 - 16:00 WIB
                        </p>
                        <a href="mailto:iniklg@gmail.com" class="block">
                            <i class="fa-regular fa-envelope mr-4"></i>
                            <span class="text-blue-400">iniklg@gmail.com</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
