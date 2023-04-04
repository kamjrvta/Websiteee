@include('partials.header')
<center> <img src="mickey.png" alt=""> </center>

<h5>EDIT RECORD</h5>
<form action="/updateCustomer" method="POST">
    @csrf
    
    <input type="hidden" id="id" name="id" value="{{$customer->id}}"> 
 
<div class="mb-3">
      <label for="firstName" class="form-label">First Name</label>
      <input 
      type="text" 
      class="form-control" 
      aria-describedby="emailHelp"
      value="{{$customer->firstName}}"
      name="firstName">
    </div>


    <div class="mb-3">
      <label for="lastName" class="form-label">Last Name</label>
      <input 
      type="text" 
      class="form-control" 
      aria-describedby="emailHelp"
      name="lastName"
      value="{{$customer->lastName}}">
    </div>



    <div class="mb-3">
      <label for="contactNumber" class="form-label">Contact Number</label>
      <input 
      type="text" 
      class="form-control" 
      id="exampleInputEmail1" 
      aria-describedby="emailHelp"
      name="contactNumber"
      value="{{$customer->contactNumber}}">
    </div>


    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input 
      type="text" 
      class="form-control" 
      aria-describedby="emailHelp"
      name="address"
      value="{{$customer->address}}">
    </div>    

 
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email Address</label>
      <input 
      type="email" 
      class="form-control" 
      id="exampleInputEmail1" 
      aria-describedby="emailHelp"
      name="email"
      value="{{$customer->email}}">
    </div>
    
       

    <button type="submit" class="btn btn-dark mb-3">Submit</button>
  </form>