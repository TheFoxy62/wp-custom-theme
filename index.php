<?php

get_header();
?>
<div class="container">
    <div class="row">
        <div class="col">
<?php
if (have_posts()):
    while (have_posts()):
        the_post();
        ?>
            <article>
                <h2><a href="<?= get_permalink() ?>"><?php the_title() ?></a></h2>
                <?php if ( has_post_thumbnail() ): ?>
                    <diV>
                        <!--Taille de l'Image-->
                        <?php the_post_thumbnail( 'medium' ); ?>
                    </div>
                <?php endif ?>
            </article>
        <?php
    endwhile;

else:
?>
<p>Aucun post n'a été trouvé</p>
    <?php
endif;
?>
        </div>
    </div>
</div>
<?php
get_footer();
