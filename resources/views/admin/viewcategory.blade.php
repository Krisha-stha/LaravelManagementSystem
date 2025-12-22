<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Categories</h3>

                    <a href="{{ route('admin.addcategory') }}"
                      class="px-4 py-2 bg-blue-600 text-white rounded">
                        + Add Category
                    </a>
                  </div>

                  <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse($categories as $category)
                        <tr>
                          <td>{{ $category->id }}</td>
                          <td>{{ $category->category_name }}</td>
                          <td>{{ $category->description }}</td>
                        <td>
                            @if($category->image)
                                <img src="{{ asset('storage/'.$category->image) }}" alt="image" width="50">
                            @else
                                N/A
                            @endif
                          </td>
                          <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
                          <td>
                            <a href="{{ route('admin.editcategory', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.deletecategory', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="6" class="text-center">No categories found.</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>