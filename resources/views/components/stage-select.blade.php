@props(['stages', 'selectedStage' => null])

<div class="form-group mb-3">
    <label for="stage" class="form-label fw-semibold">
        Giai đoạn lịch sử
        <span class="text-danger">*</span>
    </label>

    <select
        name="id_stage"
        id="stage"
        class="form-select @error('id_stage') is-invalid @enderror"
        required
    >
        <option value="">-- Chọn giai đoạn --</option>
        @foreach($stages as $stage)
            <option
                value="{{ $stage->id }}"
                {{ old('id_stage', $selectedStage) == $stage->id ? 'selected' : '' }}
            >
                {{ $stage->name }}
            </option>
        @endforeach
    </select>

    @error('id_stage')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

    <div class="form-text">
        Chọn giai đoạn lịch sử phù hợp với nội dung bài viết
    </div>
</div>
