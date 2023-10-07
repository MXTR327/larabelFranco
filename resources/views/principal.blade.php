
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
   @include("htmls.head")
   @yield("estilos")
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        @include("htmls.aside")
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            @include("htmls.header")
        </header>
        <!-- /#header -->
        <!-- Content -->
        @yield("contenido")
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
           @include("htmls.footer")
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
   @include("htmls.script")

    <!--Local Stuff-->
    @yield("scripts")
</body>
</html>
