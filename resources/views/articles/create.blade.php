<form action="{{ route('articles.store') }}" method="POST">
    @csrf

    <!-- Các trường khác -->

    <x-stage-select :stages="$stages" />

    <!-- Các trường khác -->
</form>
