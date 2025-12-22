<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
</head>
<body>
  <x-app-layout>
<div class="container py-5">
    <h2 class="mb-4">Products</h2>

    <div class="row">
      @foreach($products as $product)
      <div class="col-md-3 mb-4">
        <div class="card h-100">
          <img src="{{ asset('storage/'.$product->image) }}"
              class="card-img-top" style="height:200px;object-fit:cover;">

          <div class="card-body">
            <h5>{{ $product->name }}</h5>
            <p class="text-muted">{{ $product->category->category_name }}</p>
            <strong>Rs. {{ $product->price }}</strong>
          </div>

          <div class="card-footer text-center">
            <a href="/products/{{ $product->id }}" class="btn btn-sm btn-primary">
                View
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  {{ $products->links() }}
</div>
</x-app-layout>

</body>
</html>