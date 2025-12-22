<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show</title>
</head>
<body>
  <x-app-layout>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/'.$product->image) }}"
                 class="img-fluid rounded">
        </div>

        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <h4>Rs. {{ $product->price }}</h4>
            <p class="text-muted">
                Category: {{ $product->category->category_name }}
            </p>
        </div>
    </div>
</div>
</x-app-layout>

</body>
</html>