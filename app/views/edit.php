<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit</title>
    <!-- Include Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
    /* Container styles */
    .container {
        max-width: 600px;
        background-color: #f0f8ff; /* Light Blue */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /* Header styles */
    .mb-4 {
        text-align: center;
        font-size: 24px;
        color: #007bff; /* Blue */
    }

    /* Form styles */
    .form-label {
        font-weight: bold;
        color: #007bff; /* Blue */
    }

    .form-control {
        border: 2px solid #007bff; /* Blue */
        border-radius: 5px;
    }

    .form-control:focus {
        border-color: #0056b3; /* Darker Blue */
    }

    .btn-primary {
        background-color: #007bff; /* Blue */
        border-color: #007bff; /* Blue */
        color: #fff; /* White */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker Blue */
        border-color: #0056b3; /* Darker Blue */
    }

    /* Additional styles for spacing and form elements */
    .mb-3 {
        margin-bottom: 20px;
    }

    .form-text {
        font-size: 14px;
        color: #666;
    }
</style>

</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">User Edit</h2>
        <form action="<?= site_url('edit'); ?>" method="post">
            <input type="hidden" value="<?= $users['id'];?>" name="id">
            <p class="mb-3">ID: <?= $users['id'];?></p>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $users['username'];?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $users['email'];?>">
                <div class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= $users['password'];?>">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" value="<?= $users['password'];?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
