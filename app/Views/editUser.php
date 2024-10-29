<?php
// print_r($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- link CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>?v=<?= time(); ?>">
</head>

<body>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-lg-4">
                <form class="border rounded px-4 pb-3 pt-4" method="POST" action="<?= base_url('/update'); ?>">
                    <h3 class="text-center dm-serif-display-regular">Edit Profile</h3>
                    <hr>
                    <div class="mb-3">
                        <?php if (session()->getFlashdata('success')) { ?>
                            <p id="information-message" class="text-center bg-success text-light py-1 rounded">
                                <?= session()->getFlashdata('success') ?></p>
                        <?php } ?>
                    </div>
                    <!-- ID -->
                    <input type="hidden" id="id" name="id" value="<?= $data['id']; ?>">
                    <div class="mb-3 open-sans-text">
                        <label for="firstName">Given Name</label>
                        <input id="firstName" name="firstName" value="<?= $data['firstName']; ?>"
                            class="form-control form-control-sm" type="text" placeholder="">
                    </div>
                    <div class="mb-3 open-sans-text">
                        <label for="lastName">Family Name</label>
                        <input id="lastName" name="lastName" value="<?= $data['lastName']; ?>"
                            class="form-control form-control-sm" type="text" placeholder="">
                    </div>
                    <div class="mb-3 open-sans-text">
                        <label for="email">Email Address</label>
                        <input id="email" name="email" value="<?= $data['email']; ?>"
                            class="form-control form-control-sm" type="email" placeholder="">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="password">Password</label>
                        <input id="password" name="password" value="<?= $data['password']; ?>"
                            class="form-control form-control-sm" type="password" placeholder="">
                    </div> -->
                    <div class="mb-3 open-sans-text">
                        <label for="role">Role</label>
                        <select class="form-select form-select-sm" id="role" name="role">
                            <option value="admin" <?php echo ($data['role'] == "admin") ? 'selected' : ''; ?>>Admin
                            </option>
                            <option value="user" <?php echo ($data['role'] == "user") ? 'selected' : ''; ?>>User</option>
                        </select>
                    </div>
                    <div class="mb-3 open-sans-text">
                        <label for="status">Status</label>
                        <select class="form-select form-select-sm" id="status" name="status">
                            <option value="active" <?php echo ($data['role'] == "active") ? 'selected' : ''; ?>>Active
                            </option>
                            <option value="inactive" <?php echo ($data['role'] == "inactive") ? 'selected' : ''; ?>>
                                Inactive</option>
                        </select>
                    </div>
                    <div class="dm-serif-display-regular d-flex justify-content-end align-items-center">
                        <a href="<?= base_url('/users'); ?>" class="mx-1 btn btn-sm btn-danger">Back</a>
                        <button type="submit" class="mx-1 btn btn-success btn-sm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        // Use JavaScript to set a timeout to hide the message after 5 seconds
        setTimeout(function () {
            var message = document.getElementById('information-message');
            if (message) {
                message.style.display = 'none'; // Hide the message
            }
        }, 3000); // 5000 milliseconds = 5 seconds
    </script>

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- script data tables -->
    <script src="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.min.css"></script>

    <!-- JS Bootstrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>