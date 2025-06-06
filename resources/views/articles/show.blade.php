@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <nav class="mb-8">
            <a href="{{ route('home') }}" class="text-red-700 hover:text-red-800">
                <i class="fas fa-arrow-left mr-2"></i>Quay lại trang chủ
            </a>
        </nav>

        <article class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($article->image)
            <div class="w-full h-96 relative">
                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
            </div>
            @endif

            <div class="p-8">
                <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>

                <div class="flex items-center text-sm text-gray-500 mb-6">
                    @if($article->period)
                    <span class="mr-6">
                        <i class="fas fa-clock mr-1"></i>
                        Giai đoạn: {{ $article->period }}
                    </span>
                    @endif
                    @if($article->event_date)
                    <span class="mr-6">
                        <i class="fas fa-calendar mr-1"></i>
                        Ngày: {{ $article->event_date->format('d/m/Y') }}
                    </span>
                    @endif
                    @if($article->location)
                    <span>
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        Địa điểm: {{ $article->location }}
                    </span>
                    @endif
                </div>

                <div class="prose max-w-none">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-bold mb-4">Chia sẻ bài viết:</h3>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank"
                           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            <i class="fab fa-facebook-f mr-2"></i>Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}"
                           target="_blank"
                           class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-500">
                            <i class="fab fa-twitter mr-2"></i>Twitter
                        </a>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>
@endsection
