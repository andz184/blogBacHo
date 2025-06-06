<div class="form-group">
    <label for="stage" class="form-label">Giai đoạn lịch sử</label>
    <select name="stage" id="stage" class="form-control @error('stage') is-invalid @enderror">
        <option value="">-- Chọn giai đoạn --</option>
        @foreach($stages as $stage)
            <option value="{{ $stage->id }}" {{ old('stage', $article->id_stage ?? '') == $stage->id ? 'selected' : '' }}>
                {{ $stage->name }}
            </option>
        @endforeach
    </select>
    @error('stage')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
