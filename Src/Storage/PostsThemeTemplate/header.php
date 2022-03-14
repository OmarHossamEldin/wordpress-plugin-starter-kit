<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo(); ?></title>
    <?php wp_head(); ?>
</head>
<body class="vh-100">
    <header >
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= home_url() ?>"><?= bloginfo() ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= home_url() ?>">Home</a>
                        </li>
                        <?php foreach (get_pages() as $page) : ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?= home_url() . '/' . $page->post_name ?>"><?= $page->post_title ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>