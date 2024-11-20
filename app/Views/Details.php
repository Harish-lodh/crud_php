<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5" style="width:70%">
        <h1 style="color:red; font-weight:bold; text-align:center">Details</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show mt-3 " role="alert" style="margin-left:auto;width:300px;">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <?= implode('<br>', session()->getFlashdata('errors')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="text-end me-5">
            <a href="/form"><button type="button" class="btn btn-success mb-4">Add Employee</button></a>
        </div>

        <table class="table text-center mx-auto" style="width:90%;border:1px solid black;">
            <thead class="table-dark">
                <tr>
                    <th>SR</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php $counter = 0;
                    foreach ($data as $user):
                        $counter++; ?>
                        <tr>
                            <td><?= $counter ?></td>
                            <td><?= esc($user['name']); ?></td>
                            <td><?= esc($user['email']); ?></td>
                            <td><?= esc($user['description']); ?></td>
                            <td><?= esc($user['gender']); ?></td>
                            <td>
                                <div class="d-flex justify-content-center gap-4">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="fetchUserData(<?= $user['id']; ?>)">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </button>
                                    <a href="/delete/<?= $user['id'] ?>" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No users found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/update">
                    <div class="mb-3">
                    <label for="dataId" class="form-label">ID</label>
                        <input type="number"class="form-control"  name="id" id="dataId" readonly></div>
                        <div class="mb-3">
                            <label for="dataField" class="form-label">Name</label>
                            <input type="text" class="form-control" id="dataField" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="gender" name="gender" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function fetchUserData(id) {
            fetch(`/edit/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('dataId').value = data.id;
                    document.getElementById('dataField').value = data.name;
                    document.getElementById('email').value = data.email;
                    document.getElementById('description').value = data.description;
                    document.getElementById('gender').value = data.gender;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>
