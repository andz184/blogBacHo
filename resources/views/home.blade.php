@extends('layouts.app')

@section('content')
<!-- Navigation Menu -->


<div class="bg-red-700 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-4">Blog Bác Hồ</h1>
        <p class="text-xl text-center">Tìm hiểu về cuộc đời và sự nghiệp của Chủ tịch Hồ Chí Minh</p>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <!-- Danh sách bài viết -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @foreach($articles as $article)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                @if($article->image)
                    <div class="relative h-48">
                        <img src="{{ Storage::url($article->image) }}"
                             alt="{{ $article->title }}"
                             class="w-full h-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                            <div class="text-white text-sm">
                                @if($article->event_date)
                                    <span class="mr-2">
                                        <i class="fas fa-calendar mr-1"></i>
                                        {{ \Carbon\Carbon::parse($article->event_date)->format('d/m/Y') }}
                                    </span>
                                @endif
                                @if($article->location)
                                    <span>
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        {{ $article->location }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                <div class="p-6">
                    <div class="mb-2">
                        <span class="text-sm text-red-600 bg-red-100 px-2 py-1 rounded">
                            {{ $article->category->name }}
                        </span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 hover:text-red-700">{{ $article->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                    <a href="{{ route('articles.show', $article) }}"
                       class="inline-block bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800 transition-colors duration-300">
                        Đọc thêm
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Phân trang với style mới -->
    @if($articles->hasPages())
        <div class="mt-12 flex flex-col items-center">
            <div class="text-sm text-gray-500 mb-4">
                Showing {{ $articles->firstItem() }} to {{ $articles->lastItem() }} of {{ $articles->total() }} results
            </div>
            <div class="flex justify-center space-x-2">
                <!-- Previous Page -->
                @if($articles->onFirstPage())
                    <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-md cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $articles->previousPageUrl() }}"
                       class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 hover:text-red-600 transition-colors duration-300">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                <!-- Page Numbers -->
                @foreach($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)
                    <a href="{{ $url }}"
                       class="px-4 py-2 {{ $page == $articles->currentPage()
                           ? 'bg-red-50 text-red-600 border border-red-200 font-semibold'
                           : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-red-600' }}
                           rounded-md transition-colors duration-300">
                        {{ $page }}
                    </a>
                @endforeach

                <!-- Next Page -->
                @if($articles->hasMorePages())
                    <a href="{{ $articles->nextPageUrl() }}"
                       class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 hover:text-red-600 transition-colors duration-300">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                @else
                    <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-md cursor-not-allowed">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                @endif
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script>
    // Toggle mobile menu
    document.querySelector('.mobile-menu-button')?.addEventListener('click', function() {
        document.querySelector('.mobile-menu').classList.toggle('hidden');
    });
</script>
@endpush

@endsection
