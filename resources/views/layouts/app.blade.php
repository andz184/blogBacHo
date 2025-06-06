<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiểu sử Bác Hồ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Be Vietnam Pro', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo/Home -->
                <div class="flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-red-700 font-bold text-xl">
                        Tiểu sử Bác Hồ
                    </a>

                    <!-- Main Navigation -->
                    <div class="hidden md:block">
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('home') }}"
                               class="px-3 py-2 text-gray-700 hover:text-red-700 {{ request()->routeIs('home') ? 'text-red-700 font-semibold' : '' }}">
                                Trang chủ
                            </a>

                            <a href="{{ route('admin.login') }}"
                            class="px-3 py-2 text-gray-700 hover:text-red-700 {{ request()->routeIs('home') ? 'text-red-700 font-semibold' : '' }}">
                             Đăng nhập
                         </a>
                            <!-- Dropdown Menu -->
                            <div class="relative group">
                                <button class="px-3 py-2 text-gray-700 hover:text-red-700 inline-flex items-center">
                                    <span>Danh mục</span>
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block z-50">
                                    <div class="py-1">
                                        @foreach($categories as $category)
                                            <a href="{{ route('category.show', $category->slug) }}"
                                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700 {{ request()->is('category/'.$category->slug) ? 'bg-red-50 text-red-700 font-semibold' : '' }}">
                                                {{ $category->name }}
                                                <span class="text-xs text-gray-500">({{ $category->articles_count }})</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button"
                            class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-red-700 hover:bg-red-50 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}"
                   class="block px-3 py-2 text-gray-700 hover:bg-red-50 hover:text-red-700 {{ request()->routeIs('home') ? 'bg-red-50 text-red-700 font-semibold' : '' }}">
                    Trang chủ
                </a>
                <div class="px-3 py-2 text-gray-700 font-medium">Danh mục:</div>
                @foreach($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}"
                       class="block px-6 py-2 text-gray-700 hover:bg-red-50 hover:text-red-700 {{ request()->is('category/'.$category->slug) ? 'bg-red-50 text-red-700 font-semibold' : '' }}">
                        {{ $category->name }}
                        <span class="text-xs text-gray-500">({{ $category->articles_count }})</span>
                    </a>
                @endforeach
            </div>
        </div>

    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-red-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">Về Tiểu sử Bác Hồ</h3>
                    <p class="text-gray-300">
                        Blog chia sẻ thông tin về cuộc đời và sự nghiệp của Chủ tịch Hồ Chí Minh - Người đã cống hiến cả cuộc đời cho sự nghiệp giải phóng dân tộc.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Liên kết hữu ích</h3>

                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Theo dõi chúng tôi</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-red-700 text-center text-gray-300">
                <p>&copy; {{ date('Y') }} Tiểu sử Bác Hồ. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
