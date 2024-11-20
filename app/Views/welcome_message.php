<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
   
<form class="container w-50" method="POST" action="/add">
  
<?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show w-100 mx-auto mt-3" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <!-- Error Alert -->
    <?php if (session()->getFlashdata('errors')): ?>
      <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <?= implode('<br>', session()->getFlashdata('errors')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
<div class="mt-5">
<h1 style="color: red";> Registration Form</h1>
</div>
<div class="mb-3 mt-5">
    <label for="name" class="form-label fw-bold">Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fw-bold">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
  </div>
  <div class="mb-3">
    <label for="Description" class="form-label fw-bold">Description</label>
    <input type="textarea" class="form-control" id="Description" name="Description" required>
  </div>
   <div class="mb-3">
    <label class="fw-bold">Gender</label>
    <div class="mt-1" >
        <input type="radio" name="gender" value="Male" required>Male
        <input type="radio" name="gender" value="Female" required>Female
    </div>

   </div>
  
  <button type="submit" class="btn btn-success">Add</button>
</form>
    
</body>
</html>