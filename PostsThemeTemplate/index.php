<?php get_header(); ?>
<main class="container-fluid h-75">
    <section class="container">
        <h1 class='mt-5'><?= the_title()?></h1>
        <article>
            <?php the_content(); ?>
        </article>
    </section>
</main>
<?php get_footer(); ?>