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

          <form action="{{ route('admin.postaddcategory') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Category Name -->
            <input style="background-color:white; color:black;" type="text" name="category_name" placeholder="Category Name" required class="mb-3 form-control">

            <!-- Description -->
            <textarea name="description" placeholder="Category Description" class="mb-3 form-control"></textarea>

            <!-- Status -->
            <select name="status" class="mb-3 form-control">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>

            <!-- Image Upload -->
            <input type="file" name="image" class="mb-3 form-control">

            <!-- Submit Button -->
            <input style="background-color:green; color:white; padding:8px;" type="submit" name="submit" value="Add Category">
          </form>

          {{ __("You're in add category") }}

          <!-- LOGOUT BUTTON -->
          <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">
                Logout
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
