<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Create</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<form method="POST" action="/update-phone/{{$phone->id}}"enctype="multipart/form-data">>
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone Name</label>
    <input type="text" name="phone_name_input" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp"value="{{$phone->phone_name}}">
    @error('phone_name_input')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone Image</label>
    <input type="file" name="phone_image_input" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" value="{{$phone->phone_image_path}}">
    @error('phone_image_input')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Pemilik</label>
    <select name="pemilik_input" id="exampleInputPassword1">
      @forelse ($pemiliks as $pemilik)
          <option value="{{ $pemilik->id }}" @if ($pemilik->id == $phone->pemilik_id) selected @endif>
              {{ $pemilik->pemilik_name }}</option>
      @empty
          <option value="">Empty</option>
      @endforelse
  </select>
  @error('pemilik_input')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>