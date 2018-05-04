<!DOCTYPE html>


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta itemprop="name" content="{{ @title }}">
    <meta itemprop="description" content="{{ @title }}">
    
    <title>{{ @title }} - CheqBox.io</title>
    
    <script src="/js/modernizr-latest.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    
    <script type="text/javascript" src="/js/lightbox/ekko-lightbox.min.js"></script>
    <link rel="stylesheet" href="/js/lightbox/ekko-lightbox.min.css" type="text/css" />

    <link rel="stylesheet" href="/css/bootstrap-social.css" />

    <script src="/js/main.js"></script>
    <script src="/js/jquery.simplesidebar.js"></script>
    <script src="//cdn.ckeditor.com/4.4.2/full/ckeditor.js"></script>

    <link rel="stylesheet" href="/css/jquery.dataTables.css" />
    <script src="/js/jquery.dataTables.js"></script>
    
    <!-- SmartMenus jQuery plugin to allow for multi level nav  -->
    <link href="/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery.smartmenus.js"></script>
    <script type="text/javascript" src="/js/jquery.smartmenus.bootstrap.js"></script> 

    <link rel="stylesheet" href="/css/calendar.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    
    <script>
        $(function() {
            
        });
    </script>


 <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://maxcdn.bootstrapcdn.com/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/cheqbox.css" rel="stylesheet">
    <link href="/css/ripples.min.css" rel="stylesheet">
    <link href="/css/bootstrap-material-design.css" rel="stylesheet">
    <link href="/css/snackbar.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta name="viewport" content="width=device-width, initial-scale=1">    

</head>


<body>

    <nav class="navbar navbar-inverse">

        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="" class="navbar-brand">
                            CheqBox
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right nav-pills">
                    <check if="{{ @userUID == '' }}">
                        <true>
                            <li><a href="/Login" id="loginLink">Login</a></li>
                        </true>
                        <false>

                            <li><a href="/">Your Dashboard - <span class="badge">138</span></a></li>

                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reporting</a>
                                <ul class="dropdown-menu">
                                    <li><a href="">My Activity</a></li>
                                    <li><a href="">Analytics</a></li>
                                    <li><a href="">Inventory Report</a></li>
                                    <li><a href="">User Calendar - may move</a></li>
                                    <li><a href="">Files Worked - 3D</a></li>
                                    <li><a href="">Assign Files</a></li>
                                    <li><a href="">Revenue Report</a></li>
                                    <li><a href="">Revenue Total</a></li>
                                    <li><a href="">Stair Step Report</a></li>
                                </ul>
                            </li>

                            <li><a href="/company/team">Team</a></li>

<!--
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-envelope"></span> Messages</span></a>
                              <ul class="dropdown-menu dropdown-cart" role="menu">
                                  <li>
                                      <span class="item">
                                        <span class="item-left">
                                            <img src="http://lorempixel.com/50/50/" alt="" />
                                            <span class="item-info">
                                                <span>Item name</span>
                                                <span>23$</span>
                                            </span>
                                        </span>
                                        <span class="item-right">
                                            <button class="btn btn-xs btn-danger pull-right">x</button>
                                        </span>
                                    </span>
                                  </li>
                                  <li>
                                      <span class="item">
                                        <span class="item-left">
                                            <img src="http://lorempixel.com/50/50/" alt="" />
                                            <span class="item-info">
                                                <span>Item name</span>
                                                <span>23$</span>
                                            </span>
                                        </span>
                                        <span class="item-right">
                                            <button class="btn btn-xs btn-danger pull-right">x</button>
                                        </span>
                                    </span>
                                  </li>
                                  <li>
                                      <span class="item">
                                        <span class="item-left">
                                            <img src="http://lorempixel.com/50/50/" alt="" />
                                            <span class="item-info">
                                                <span>Item name</span>
                                                <span>23$</span>
                                            </span>
                                        </span>
                                        <span class="item-right">
                                            <button class="btn btn-xs btn-danger pull-right">x</button>
                                        </span>
                                    </span>
                                  </li>
                                  <li>
                                      <span class="item">
                                        <span class="item-left">
                                            <img src="http://lorempixel.com/50/50/" alt="" />
                                            <span class="item-info">
                                                <span>Item name</span>
                                                <span>23$</span>
                                            </span>
                                        </span>
                                        <span class="item-right">
                                            <button class="btn btn-xs btn-danger pull-right">x</button>
                                        </span>
                                    </span>
                                  </li>
                                  <li class="divider"></li>
                                  <li><a class="text-center" href="">View all of your CheqBox messages</a></li>
                              </ul>
                            </li>
-->
<!--
                            <li><a href="/calendar"><span class="glyphicon glyphicon-calendar"></span> Calendar</span></a></li>
-->
                            <li><a href="/company/manage">Manage</a></li>

                            <li><a href="/company/settings">Settings</a></li>

                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ @fname }}</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/MyInfo">Profile</a></li>
                                    <li><a href="/Referrals">Referrals</a></li>
                                    <li><a href="">Switch Accounts</a></li>
                                    <li><a href="/ChangePassword">Change Password</a></li>
                                    <li><a href="/Logout" id="loginLink">Logout</a></li>
                                </ul>
                            </li>
                            <check if="{{ @userLevel == 2 || @userLevel == 3 }}">
                                <true>
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/admin/company/users">Users</a></li>
                                            <li><a href="/admin/company/sales">Sales</a></li>
                                            <li><a href="/admin/company/staff">Staff</a></li>
                                        </ul>
                                    </li>
                                </true>
                            </check>
                            <check if="{{ @userLevel == 3 }}">
                                <true>
                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">SA</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/admin/userlist">User List</a></li>
                                            <li><a href="/admin/newuser">New User</a></li>
                                            <li><a href="/admin/company/list">Companies</a></li>
                                        </ul>
                                    </li>
                                </true>
                            </check>
                        </false>
                    </check>
                    <li><a href="/help">Help</a></li>
                </ul>
            </div>
        </div>
    </nav>

