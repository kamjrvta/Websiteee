@include('partials.header')

<x-nav/>
<table class="table table-hover">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      
      <th></th>
      <th>

      </th>
    </tr>
  </thead>
  @if(Session::has('success'))
  <div class="alert alert-warning" role="alert">
  {{ Session::get('success') }}
</div>
    
  @endif
  @foreach ($products as $product)
     
  <tbody>
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->description}}</td>
      <td>{{$product->quantity}}</td>
      <td>{{$product->price}}</td>
     
      <td><a href="/products/edit-product/{{$product->id}}" class="text-info-emphasis">Edit</a></td>
      <td><a href="/products/delete-product/{{$product->id}}" class="text-danger">DELETE</a></td>
    
    </tr>
  </tbody>
  @endforeach
</table>

@include('partials.footer')