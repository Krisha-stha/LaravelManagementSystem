<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                  <div class="mb-4 flex justify-end">
                      <a href="{{ route('cart.index') }}" class="btn btn-primary">
                          View Cart
                      </a>
                  </div>

                  <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
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
                          <td>
                            <form action="{{ route('cart.add', $category->id) }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-sm btn-primary">Add to Cart</button>
                            </form>

                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="5" class="text-center">No categories found.</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
