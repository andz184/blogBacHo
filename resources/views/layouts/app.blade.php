<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Bác Hồ</title>
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
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-2xl font-bold text-red-700">
                            Blog Bác Hồ
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Trang chủ
                    </a>
                </div>
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
                    <h3 class="text-lg font-bold mb-4">Về Blog Bác Hồ</h3>
                    <p class="text-gray-300">
                        Blog chia sẻ thông tin về cuộc đời và sự nghiệp của Chủ tịch Hồ Chí Minh - Người đã cống hiến cả cuộc đời cho sự nghiệp giải phóng dân tộc.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Liên kết hữu ích</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="http://www.bqllang.gov.vn/" class="text-gray-300 hover:text-white">
                                Lăng Chủ tịch Hồ Chí Minh
                            </a>
                        </li>
                        <li>
                            <a href="http://www.btgcp.gov.vn/" class="text-gray-300 hover:text-white">
                                Ban Tuyên giáo Trung ương
                            </a>
                        </li>
                    </ul>
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
                <p>&copy; {{ date('Y') }} Blog Bác Hồ. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
