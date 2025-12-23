<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Your Cart') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">

          @if(empty($cart))
              <p>Your cart is empty.</p>
          @else
              <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($cart as $item)
                    <tr>
                      <td>
                        @if(isset($item['image']))
                            <img src="{{ asset('storage/'.$item['image']) }}" width="50">
                        @else
                            N/A
                        @endif
                      </td>
                      <td>{{ $item['name'] }}</td>
                      <td>{{ $item['quantity'] }}</td>
                      <td class="flex gap-2">
                        <form action="{{ route('cart.increase', $item['id']) }}" method="POST">
                          @csrf
                          <button class="btn btn-sm btn-success">+</button>
                        </form>

                        <form action="{{ route('cart.decrease', $item['id']) }}" method="POST">
                          @csrf
                          <button class="btn btn-sm btn-warning">-</button>
                        </form>

                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                          @csrf
                          <button class="btn btn-sm btn-danger">Remove</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          @endif

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
