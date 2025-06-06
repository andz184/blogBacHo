<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị - Tiểu sử Bác Hồ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @auth
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('admin.articles.index') }}" class="text-xl font-bold text-red-600">
                                <i class="fas fa-home mr-2"></i>Tiểu sử Bác Hồ - Quản trị
                            </a>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('admin.articles.index') }}"
                               class="inline-flex items-center px-1 pt-1 {{ request()->routeIs('admin.articles.*') ? 'border-b-2 border-red-500 text-red-600' : 'text-gray-500 hover:text-red-600' }}">
                                <i class="fas fa-newspaper mr-2"></i>Bài viết
                            </a>
                            <a href="{{ route('admin.categories.index') }}"
                               class="inline-flex items-center px-1 pt-1 {{ request()->routeIs('admin.categories.*') ? 'border-b-2 border-red-500 text-red-600' : 'text-gray-500 hover:text-red-600' }}">
                                <i class="fas fa-folder mr-2"></i>Danh mục
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-red-600 mr-4" target="_blank">
                            <i class="fas fa-external-link-alt mr-1"></i>Xem trang chủ
                        </a>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-red-600">
                                <i class="fas fa-sign-out-alt mr-1"></i>Đăng xuất
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Mobile menu -->
        <div class="sm:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('admin.articles.index') }}"
                   class="block px-3 py-2 rounded-md {{ request()->routeIs('admin.articles.*') ? 'bg-red-50 text-red-600' : 'text-gray-500 hover:bg-red-50 hover:text-red-600' }}">
                    <i class="fas fa-newspaper mr-2"></i>Bài viết
                </a>
                <a href="{{ route('admin.categories.index') }}"
                   class="block px-3 py-2 rounded-md {{ request()->routeIs('admin.categories.*') ? 'bg-red-50 text-red-600' : 'text-gray-500 hover:bg-red-50 hover:text-red-600' }}">
                    <i class="fas fa-folder mr-2"></i>Danh mục
                </a>
            </div>
        </div>
    @endauth

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    @stack('scripts')
</body>
</html>
