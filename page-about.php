<?php
/*
Template Name: About Page
*/
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
get_header(); ?>

<body id="about" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo $backgroundImg[0]; ?>'); background-attachment: fixed; background-repeat: no-repeat; background-size: 100% 100%;">
    <main class="about-container" role="main">
        <section class="container">
            <header>
                <h1 class="page-name"><?php the_title(); ?></h1>
            </header>

            <?php if ( have_posts() ): ?>
                <?php while ( have_posts() ): the_post();
                    $about_thumbnail = get_field('about_thumbnail');
                    $size = "full";
                ?>

                <div class="row">
                    <figure class="about-image col-sm-6">
                        <?php if($about_thumbnail) {?>
                            <?php echo wp_get_attachment_image( $about_thumbnail, $size ); ?>
                        <?php } ?>
                    </figure>

                    <div id="content" class="col-sm-6">
                        <article class="about-post">
                            <p><?php the_content(); ?></p>
                            <?php endwhile; ?>
                        </article>
                        <div class="row contact">
                            <div class="col-sm-12">
                                <button class="btn" data-toggle="modal" data-target="#myModal">
                                      Contact Me
                                </button>
                                <a href="https://www.instagram.com/shot2frame/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <i class="fa fa-snapchat-square" aria-hidden="true"></i>
                                <i class="fa fa-facebook-square" aria-hidden="true"></i>
                                <i class="fa fa-twitter-square" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>

        <section class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h1 class="modal-title" id="myModalLabel">Interested in Working Together?</h1>
                    </div>
                    <div class="modal-body">
                        <p>
                            Or want to know more about Sam? Simply fill out the form below and I'll answer ASAP!
                        </p>
                        <form>
                            <?php echo do_shortcode( '[ninja_form id=1]' ); ?>
                        </form>

                        <hr>

                        <p>
                            <small>
                                Your email will NOT be used for spam nor will it be sold. We respect your privacy!
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();
