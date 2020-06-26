<!-- <link rel="stylesheet" href="web/styles/styles.css"> -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a onclick="reload()" class="navbar-brand" href=""><i class="fas fa-home text-light icon-medium mr-1"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  

    <a onclick="getAllTopics()" class="btn btn-primary mx-2" href="#" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-book-open text-light icon-small mr-1"></i> Reviews </a>
    
    <a onclick="loadSubjects()" class="btn btn-primary mx-2" href="#" id="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-book text-light icon-small mr-1"></i> Subjects </a>

    <ul class="navbar-nav d-block float-right">
      <li class="nav-item dropdown ">
        <a class="btn btn-secondary dropdown-toggle mx-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-question text-light icon-small mr-1"></i> Help
        
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a onclick="" class="dropdown-item" href="#"> <i class="fas fa-book mr-2"></i> Theory of review </a>
          <a onclick="" class="dropdown-item" href="#"> <i class="fas fa-book mr-2"></i> User's guide </a>
          <a onclick="" class="dropdown-item" href="#"> <i class="fas fa-code mr-2"></i> Documentation </a>
          <a class="dropdown-item" href="#"> <i class="fas fa-book mr-2"></i> About </a>
         
      </li> 
    </ul>
    
    <div class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
      <ul class="navbar-nav d-block float-right">
        
        <li class="nav-item dropdown dropleft">
          <a class="btn btn-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-graduate text-light icon-small mr-1"></i>
            <?php echo $_SESSION['username']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a onclick="logout()" class="dropdown-item" href="#"> <i class="fas fa-sign-out-alt mr-2"></i> Log out </a>
            
            <a class="dropdown-item" href="#"> <i class="fas fa-cog mr-2"></i> Settings </a>
            
          </li> 
        </ul>
    </div>

    
    <!-- <form class="form-inline my-2 my-lg-0">

      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

    </form> -->
  </div>
</nav>