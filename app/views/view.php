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
            font-size: 18px;
        }
        .container {
            background-color: #fff; /* White */
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }
        .mb-3 label {
            font-weight: bold;
            color: #007bff; /* Blue */
        }
        .btn-primary {
            background-color: #007bff; /* Blue */
            border-color: #007bff; /* Blue */
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
            padding: 20px;
        }
        .table th {
            background-color: #007bff; /* Blue */
            color: #fff;
        }
        .table th, .table td {
            text-align: center;
        }
        .btn-danger, .btn-primary {
            margin-right: 10px;
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
        <h2 style="color: #007bff; font-size: 24px;">User Registration</h2>
        <form action="<?= site_url('insert'); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container">
        <h2 style="color: #007bff; font-size: 24px;">User List</h2>
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
                            <a href="<?= site_url('delete/'. $user['id']);?>" data-id="<?= $user['id']; ?>" class="btn btn-danger delete-user">Delete</a>
                            <a href="<?= site_url('seteditdata/'. $user['id']);?>" type="button" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
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
