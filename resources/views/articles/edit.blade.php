<form action="{{ route('articles.update', $article->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Các trường khác -->

    <x-stage-select
        :stages="$stages"
        :selectedStage="$article->id_stage"
    />

    <!-- Các trường khác -->
</form>
