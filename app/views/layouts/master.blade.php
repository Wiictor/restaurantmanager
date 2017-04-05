<!DOCTYPE html>
<html>
  <head>
    <title>Restaurant manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/united/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/angularjs-toaster/0.4.4/toaster.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" >    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body ng-app="restaurantApp">
  <toaster-container></toaster-container>
  	@include('partials.navigation')
    @yield('content')
    @include('partials.footer')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/lib/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.2.16/angular-route.min.js"></script>
    <script src="https://code.angularjs.org/1.2.16/angular-animate.min.js" ></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/lib/ui-bootstrap-tpls-0.11.0.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angularjs-toaster/0.4.4/toaster.js"></script> 
    <script src="js/lib/angular-file-upload.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/services/tableService.js"></script>
    <script src="js/services/authService.js"></script>
    <script src="js/services/reservationService.js"></script>
    <script src="js/services/userService.js"></script>
    <script src="js/controllers/indexController.js"></script>
    <script src="js/controllers/adminController.js"></script>
    <script src="js/controllers/tableController.js"></script>
    <script src="js/controllers/usersController.js"></script>
    <script src="js/controllers/reservationsController.js"></script>
    <script src="js/directives/disableAnimation.js"></script>
  </body>
</html>