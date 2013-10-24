<header class="banner navbar navbar-default navbar-static-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" title="zur Startseite von la luna d'oro" href="<?php echo home_url(); ?>">la luna d'oro</a>
        </div>
        <a href="<?php echo home_url(); ?>" title="zur Startseite von la luna d'oro">
            <img class="logo" src="/Media/logo.png">
        </a>

        <div class="pull-right service-menu">
            <nav class="navbar navbar-default">
                <?php if (has_nav_menu( 'service_menu')) : wp_nav_menu(array( 'theme_location'=>'service_menu', 'menu_class' => 'nav navbar-nav hidden-xs')); endif; ?>
            </nav>
        </div>


        <form role="search" method="get" class="header-search navbar-form navbar-right" action="/">
            <div class="input-group">
                <input type="text" name="s" class="form-control" placeholder="Suchen..." />
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </form>
    </div>
</header>

<section class="navigation">
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
             </div>
             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse navbar-ex1-collapse">
                 <?php if (has_nav_menu( 'primary_navigation')) : wp_nav_menu(array( 'theme_location'=>'primary_navigation', 'menu_class' => 'nav navbar-nav')); endif; ?>
             </div>
             <!-- /.navbar-collapse -->
         </nav>
    </div>
</section>