<div class="form-group">
    <label for="name">Tên giai đoạn <span class="text-danger">*</span></label>
    <input type="text"
           class="form-control @error('name') is-invalid @enderror"
           id="name"
           name="name"
           value="{{ old('name', $stage->name ?? '') }}"
           required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Mô tả</label>
    <textarea class="form-control @error('description') is-invalid @enderror"
              id="description"
              name="description"
              rows="3">{{ old('description', $stage->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="status">Trạng thái</label>
    <select class="form-control @error('status') is-invalid @enderror"
            id="status"
            name="status">
        <option value="1" {{ old('status', $stage->status ?? '1') == '1' ? 'selected' : '' }}>
            Hoạt động
        </option>
        <option value="0" {{ old('status', $stage->status ?? '1') == '0' ? 'selected' : '' }}>
            Không hoạt động
        </option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
