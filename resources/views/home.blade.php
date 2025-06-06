@extends('layouts.app')

@section('content')
<div class="bg-red-700 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-4">Blog Bác Hồ</h1>
        <p class="text-xl text-center">Tìm hiểu về cuộc đời và sự nghiệp của Chủ tịch Hồ Chí Minh</p>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    @php
        $periods = $articles->groupBy('period');
    @endphp

    @foreach($periods as $period => $periodArticles)
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6 text-red-700 border-b-2 border-red-700 pb-2">{{ $period }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($periodArticles as $article)
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
        </div>
    @endforeach
</div>
@endsection
