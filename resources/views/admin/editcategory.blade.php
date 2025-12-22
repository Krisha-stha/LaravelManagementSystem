<x-app-layout>
  <x-slot name="header">
      <h2>Edit Category</h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white p-6 shadow rounded">
        <form action="{{ route('admin.updatecategory', $category->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- Category Name -->
          <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control mb-3" required>

          <!-- Description -->
          <textarea name="description" class="form-control mb-3">{{ $category->description }}</textarea>

          <!-- Status -->
          <select name="status" class="form-control mb-3">
              <option value="1" {{ $category->status ? 'selected' : '' }}>Active</option>
              <option value="0" {{ !$category->status ? 'selected' : '' }}>Inactive</option>
          </select>

          <!-- Image Upload -->
          <input type="file" name="image" class="form-control mb-3">
          @if($category->image)
              <img src="{{ asset('storage/'.$category->image) }}" alt="image" width="50">
          @endif

          <button type="submit" class="btn btn-success">Update Category</button>
          <a href="{{ route('admin.viewcategory') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
