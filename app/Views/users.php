<?php

// echo '<pre>';
// print_r($data);
// echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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

    <!-- Data tables -->
    <script>
        let table = new DataTable('#showTable');

        $(document).ready(function () {
            $('#example').DataTable();
            // Enable Bootstrap tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>

</head>

<body>

    <?php include("layout.php"); ?>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-lg-12">
                <table class="table table-responsive table-hover" id="example" class="display"
                    style="width:100%">
                    <thead>
                        <tr class="dm-serif-display-regular">
                            <th>ID</th>
                            <th>Given Name</th>
                            <th>Last Name</th>
                            <th>Email Address</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Date created</th>
                            <th>Date updated</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="open-sans-text">
                        <?php
                        foreach ($data as $person) {
                            echo "<tr>";
                            echo "<td>{$person['id']}</td>";
                            echo "<td class='text-capitalize'>{$person['firstName']}</td>";
                            echo "<td class='text-capitalize'>{$person['lastName']}</td>";
                            echo "<td>{$person['email']}</td>";
                            echo "<td class='text-capitalize'>{$person['role']}</td>";
                            echo "<td class='text-capitalize'>{$person['status']}</td>";
                            echo "<td>{$person['ucreated_at']}</td>";
                            echo "<td>{$person['uupdated_at']}</td>";
                            echo "<td class='text-center dm-serif-display-regular'><a class='mx-1 btn btn-warning btn-sm' href='/editUser/{$person['id']}'>Edit</a>";
                            echo "<a class='mx-1 btn btn-danger btn-sm' href='/deleteUser/{$person['id']}'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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