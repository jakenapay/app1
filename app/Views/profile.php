<?php
// Assuming $data is available and contains user information
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- link CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>?v=<?= time(); ?>">
</head>

<body>
    <div class="font-[sans-serif]">
        <div class="min-h-screen flex flex-col items-center justify-center py-0 px-4">
            <div class="grid md:grid-cols-2 items-center gap-10 max-w-6xl w-full">
                <div>
                    <h2 class="lg:text-5xl text-4xl font-extrabold lg:leading-[55px] text-gray-800">
                        User Profile
                    </h2>
                    <p class="text-sm mt-6 text-gray-800">Welcome to your profile page, <?= esc($data['firstName']); ?>!</p>
                </div>

                <div class="max-w-md md:ml-auto w-full">
                    <h3 class="text-gray-800 text-3xl font-extrabold mb-5">
                        Profile Information
                    </h3>

                    <div class="mb-3">
                        <?php if (session()->getFlashdata('success')) { ?>
                            <p id="information-message" class="text-center bg-success text-light py-1 rounded">
                                <?= session()->getFlashdata('success') ?>
                            </p>
                        <?php } elseif (session()->getFlashdata('error')) { ?>
                            <p id="information-message" class="text-center bg-danger text-light py-1 rounded">
                                <?= session()->getFlashdata('error') ?>
                            </p>
                        <?php } ?>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="firstName" class="text-sm font-semibold">First Name:</label>
                            <input id="firstName" name="firstName" type="text" readonly
                                class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-blue-600"
                                value="<?= esc($data['firstName']); ?>" />
                        </div>
                        <div>
                            <label for="lastName" class="text-sm font-semibold">Last Name:</label>
                            <input id="lastName" name="lastName" type="text" readonly
                                class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-blue-600"
                                value="<?= esc($data['lastName']); ?>" />
                        </div>
                        <div>
                            <label for="email" class="text-sm font-semibold">Email:</label>
                            <input id="email" name="email" type="email" readonly
                                class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-blue-600"
                                value="<?= esc($data['email']); ?>" />
                        </div>
                        <div>
                            <label for="role" class="text-sm font-semibold">Role:</label>
                            <input id="role" name="role" type="text" readonly
                                class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-blue-600"
                                value="<?= esc($data['role']); ?>" />
                        </div>
                        <div>
                            <label for="status" class="text-sm font-semibold">Status:</label>
                            <input id="status" name="status" type="text" readonly
                                class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-blue-600"
                                value="<?= esc($data['status']); ?>" />
                        </div>
                    </div>

                    <div class="!mt-8">
                        <a href="<?= base_url('/logout'); ?>" 
                            class="mt-2 w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-red-600 hover:bg-red-700 focus:outline-none text-center block">
                            Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Bootstrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
