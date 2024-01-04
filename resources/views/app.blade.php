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
    {{-- Swiper JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <style>
        *,
        html,
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Roboto Condensed', sans-serif;
            scroll-behavior: smooth;
            /* font-style: normal !important; */
        }

        body {
            overflow-x: hidden;
        }
        /* Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none; /* Firefox */
        }

        /* CSS RESET */
        .image {
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .image_resized {
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .body_description > ul,
        .body_description > ul li {
            list-style-type: disc;
        }

        .body_description ul {
            padding-left: 40px;
        }

        .body_description > ol,
        .body_description > ol li {
            list-style-type: decimal;
        }

        .body_description ol {
            padding-left: 40px;
        }

        .body_description > h1 {
            display: block;
            font-size: 2em;
            margin-top: 0.67em;
            margin-bottom: 0.67em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        .body_description > h2 {
            display: block;
            font-size: 1.5em;
            margin-top: 0.83em;
            margin-bottom: 0.83em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        .body_description > h3 {
            display: block;
            font-size: 1.17em;
            margin-top: 1em;
            margin-bottom: 1em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        .body_description > h4 {
            display: block;
            margin-top: 1.33em;
            margin-bottom: 1.33em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        .body_description > h5 {
            display: block;
            font-size: 0.83em;
            margin-top: 1.67em;
            margin-bottom: 1.67em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        .body_description > h6 {
            display: block;
            font-size: 0.67em;
            margin-top: 2.33em;
            margin-bottom: 2.33em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="w-full flex justify-center py-2"></div>
    <nav>
        <div class="w-full py-2.5 md:px-10 px-2 bg-green-800">
            <div class="item_navbar w-full flex justify-between items-center text-white text-sm">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('img/logo/logo_web.png') }}" class="w-28 h-12" alt="logo_web">
                    <p class="text-white md:text-3xl text-xl font-bold md:tracking-[10px] tracking-[8px] uppercase">SEKOLAHKLG</p>
                </div>
                <div class="md:block hidden space-x-10">
                    <a href="{{ URL('/') }}">Beranda</a>
                    <a href="#listBooks">Buku</a>
                    {{-- <details class="dropdown">
                        <summary class="m-1 cursor-pointer">Buku</summary>
                        <ul class="p-2 shadow menu dropdown-content z-[10] bg-base-100 rounded w-52">
                            <li>
                                <a href="" class="text-slate-600">E-Modul</a>
                            </li>
                            <li>
                                <a href="" class="text-slate-600">Pendidikan</a>
                            </li>
                        </ul>
                    </details> --}}
                    <a href="https://wa.me/6288214972668" class="" target="_blank">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="carousel__main mt-5">
        <div class="w-full flex justify-center">
            <div class="w-11/12 h-auto p-2">
                <div class="swiper relative">
                    <div class="swiper-wrapper">
                        @if (!empty($banners))
                        @foreach ($banners as $banner)
                            @foreach ($banner->img_banner as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset('/storage/banner-image/' . $image) }}" class="w-full md:h-auto md:max-h-[600px] h-80 bg-cover rounded-lg brightness-50" alt="">
                                </div>
                            @endforeach
                        @endforeach
                        @else
                            <div class="swiper-slide">
                                <img src="{{ asset('img/Slider Image/img_slider1.jpeg') }}" class="w-full md:h-auto md:max-h-[600px] h-80 bg-cover rounded-lg brightness-50" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('img/Slider Image/img_slider2.jpeg') }}" class="w-full md:h-auto md:max-h-[600px] h-80 bg-cover rounded-lg brightness-50" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('img/Slider Image/img_slider3.jpeg') }}" class="w-full md:h-auto md:max-h-[600px] h-80 bg-cover rounded-lg brightness-50" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('img/Slider Image/img_slider4.jpeg') }}" class="w-full md:h-auto md:max-h-[600px] h-80 bg-cover rounded-lg brightness-50" alt="">
                            </div>
                        @endif
                    </div>
                    <div class="custom_text absolute top-1/4 -translate-x-1/2 left-1/2 z-50">
                        <p class="md:text-3xl text-xl md:whitespace-normal whitespace-nowrap font-semibold text-white">"BERMAIN MENJADI INDONESIA"</p>
                    </div>
                    <div class="custom_btn absolute bottom-[10%] -translate-x-1/2 left-1/2 z-50">
                        <a href="#listBooks" class="py-3 md:px-20 px-10 bg-green-800/60 hover:bg-green-600/60 transition-colors duration-150 rounded-md text-white">Daftar Buku</a>
                    </div>
                    {{-- <div class="swiper-pagination"></div> --}}
        
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </div>
    </div>
    <main class="w-full h-full min-h-screen">
        @yield('content')
    </main>
    <footer>
        {{-- <div class="upper_footer text-center w-full h-auto">
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
        </div> --}}
        <div class="bottom_footer mt-5 bg-green-800">
            <div class="flex justify-center">
                <div class="w-full h-auto p-8">
                    <div class="grid md:grid-cols-2 grid-cols-1 md:gap-2 gap-10">
                        <div class="w-full h-full md:px-28 px-0">
                            <img src="{{ asset('img/logo/logo_web.png') }}" class="w-28 h-10" alt="logo">
                            <div class="description font-light text-base space-y-4 mt-6 text-white not-italic">
                                <p class="">
                                    <i class="fa-solid fa-city mr-4"></i>
                                    Kampung Lali Gadget
                                </p>
                                <a href="https://wa.me/6288214972668" target="_blank" class="tracking-widest block">
                                    <i class="fa-solid fa-phone mr-4"></i>
                                    +62 88-214972668
                                </a>
                                <p class="">
                                    <i class="fa-regular fa-clock mr-4"></i>
                                    Pelayanan Senin-Jumat pukul 08:00 - 16:00 WIB
                                </p>
                                <a href="mailto::iniklg@gmail.com" class="block">
                                    <i class="fa-regular fa-envelope mr-4"></i>
                                    <span>iniklg@gmail.com</span>
                                </a>
                            </div>
                            <div class="flex items-center space-x-4 mt-5">
                                <a href="">
                                    <img src="{{ asset('img/icons/facebook.webp') }}" class="w-6 h-6" alt="fb icon">
                                </a>
                                <a href="">
                                    <img src="{{ asset('img/icons/twitter.webp') }}" class="w-6 h-6" alt="twt icoon">
                                </a>
                                <a href="">
                                    <img src="{{ asset('img/icons/youtube.webp') }}" class="w-6 h-6" alt="yt icon">
                                </a>
                                <a href="https://www.instagram.com/kampunglaligadget/" target="_blank">
                                    <img src="{{ asset('img/icons/instagram.webp') }}" class="w-6 h-6" alt="ig icon">
                                </a>
                            </div>
                        </div>
                         <div class="embed__maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.423870514181!2d112.61303579999999!3d-7.418252299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7809c167a434af%3A0xc06462924a4e3080!2sKampung%20Lali%20Gadget!5e0!3m2!1sid!2sid!4v1701693847290!5m2!1sid!2sid" class="rounded-md" width="100%" height="300" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 4000,
                pauseOnMouseEnter: true,
            },
            grabCursor: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        })
        swiper.slideNext();
    </script>
</body>

</html>
