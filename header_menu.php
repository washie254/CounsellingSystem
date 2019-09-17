
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">


  <div id="wrapper">
    

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="top-area">
        <div class="container">
          <div class="row">
           
            <div class="col-sm-6 col-md-6">
              <p class="bold text-left">University Student Virtual Guidance & Couselling System</p>
            </div>
            
            <div class="col-sm-6 col-md-6">
              <p class="bold text-right">advice@studentvirtualcouselling.co.ke</p>
            </div>
            
          </div>
        </div>
      </div>
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
          <a class="navbar-brand" href="/CounsellingSystem">
                    <img src="/CounsellingSystem/img/logo.png" alt="" width="150" height="40" />
                </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-left navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/CounsellingSystem">Home</a></li>
            <li><a href="/CounsellingSystem/#service">Service</a></li>
            <li><a href="/CounsellingSystem/list-provider.php">Counsellors</a></li>            
            <li><a href="/CounsellingSystem#about">About</a></li>
            <li><a href="/CounsellingSystem#contact">Contact</a></li>
            <li><a href="/CounsellingSystem#faq">FAQ</a></li>            
             
             
             <?php
				if (isset($_SESSION['ses_member_id'])&&isset($_SESSION['ses_member_email']) ) {
				
				echo "<li><a href=\"/CounsellingSystem/login/profile/profile.php\">Profile</a></li>";
				
				echo "<li><a href=\"/CounsellingSystem/login/profile/logout.php\">Log Out</a></li>";
				
					
					} else {
                     
					 echo "<li><a href=\"/CounsellingSystem/login/login.php\">LOGIN</a></li>";
					 
					}  ?> 
            
             
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>
    
	
    
    

   