<div class="mb-4 mt-3">
    <select wire:model="category_id" class="form-select" aria-label="Default select example">
        <option selected>Выберите категорию</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
