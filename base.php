<?php
  // api mode returns a page with no ui, ideally just a php file
  // request any page with post vars api_mode = true and api_file = 'path/to/file.php'
  if ( isset($_POST['api_mode']) ):
    include $_POST['api_file'];
  else:

  get_template_part('templates/head');
?>

<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main <?php echo roots_main_class(); ?>" role="main">
        

        <div class="container">
          <div class="row">

            <form class="col-sm-6 js-form" action="<?php echo home_url(); ?>" method="POST">
              <input name="api_mode" type="hidden" value="true" />
              <input name="api_file" type="hidden" value="services/submit-form.php" />
              <input name="super-awesome-input" placeholder="HELLO I AM FORM" class="form-control" />
              <br>
              <button class="btn btn-primary">Submit!</button>
            </form>

            <div class="col-sm-6">
              <h2 class="js-target"></h2>
            </div>

          </div>
        </div>


      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>

<?php endif; ?>
