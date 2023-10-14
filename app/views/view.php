<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- Include Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3y-D65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl-NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        /* Custom styles for the page */
        body {
            background-color: #f8f8f8; /* Light Gray */
        }
        .container {
            background-color: #fff; /* White */
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .mb-3 label {
            font-weight: bold;
            color: #007bff; /* Blue */
            font-size: 20px;
        }
        .btn-primary {
            background-color: #007bff; /* Blue */
            border-color: #007bff; /* Blue */
            font-size: 18px;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker Blue */
            border-color: #0056b3; /* Darker Blue */
        }
        .table {
            background-color: #fff;
            border: 1px solid #ccc;
        }
        .table th, .table td {
            border: 1px solid #ccc;
            font-size: 18px;
            padding: 15px;
        }
        .table th {
            background-color: #007bff; /* Blue */
            color: #fff;
        }
        .table th, .table td {
            text-align: center;
        }
        .btn-danger, .btn-primary {
            margin-right: 5px;
        }
        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
            padding: 10px;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 style="color: #007bff;">User Registration</h2>
        <form action="<?= site_url('insert'); ?>" method="post">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
        </form>
        <div class="container mt-5">
        <h2 style="color: #007bff;">User List</h2>
        <table class="table table-striped">
            <thead>
                 <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Actions</th>
                </tr>

            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <th scope="row"><?= $user['id'] ?></th>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['password'] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#deleteConfirmation<?= $user['id']; ?>" class="btn btn-danger">Delete</a>
                            <a href="<?= site_url('seteditdata/'. $user['id']);?>" type="button" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteConfirmation<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteConfirmationLabel">Confirm Deletion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this user?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <a href="<?= site_url('delete/'. $user['id']);?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Select all elements with the class "delete-user"
        const deleteButtons = document.querySelectorAll(".delete-user");

        // Add a click event listener to each delete button
        deleteButtons.forEach(function (button) {
            button.addEventListener("click", function (e) {
                e.preventDefault(); // Prevent the default link behavior

                const userId = button.getAttribute("data-id");

                // Show a confirmation dialog
                const confirmed = confirm("Are you sure you want to delete this user?");

                if (confirmed) {
                    // If the user confirms, redirect to the delete URL
                    window.location.href = `<?= site_url('delete/'); ?>${userId}`;
                }
            });
        });
    });
</script>
</body>
</html>
