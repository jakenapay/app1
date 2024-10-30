<nav class="navbar navbar-expand-lg navbar-light nav-container sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">LOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <?php
                $current_page = basename($_SERVER['SCRIPT_NAME']); // Get the current page file name
                ?>
                <!-- <a class="nav-link fw-bold <?php if ($current_page == 'index.php')
                    echo 'active'; ?>" aria-current="page" href="/users">Home</a> -->
                <a class="nav-link fw-bold <?php if ($current_page == 'users.php')
                    echo 'active'; ?>" href="/users">Users</a>
                <a class="nav-link fw-bold <?php if ($current_page == 'product.php')
                    echo 'active'; ?>" href="/product">Products</a>

                <?php
                $session = session();
                if ($session->get('isLoggedIn')): ?>
                    <a class="nav-link fw-bold active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Profile"
                        href="/profile/<?php echo esc($session->get('id')); ?>">
                        <i class="fa-solid fa-user"></i>
                    </a>


                    <a class="nav-link fw-bold active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Log out"
                        href="/logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                <?php else: ?>
                    <a class="nav-link fw-bold active" href="/loginPage" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Log in">Log In</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>