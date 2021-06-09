<!DOCTYPE html>
<html lang="ro">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page!</title>
    <link rel="stylesheet" href="Styleprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>


<body>
    <div class="mobile-container">
<div class="topnav">
 <img src="images/Logoo.png" class="logo">
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>



  <div id="myLinks">
    <ul id="ul">
    <li><a href="index.html">Acasa</a></li>
    <li><a href="despre.html">Despre</a></li>
    <li><a href="anunturi.html">Anunturi</a></li>
    <li><a href="profesori.html">Profesori</a></li>
  </ul>
  <div class="register">
        <li><a href="index.html"><i class="fas fa-sign-in-alt"></i> SignIn/Up </a></li>
        <li><a href="despre.html"><i class="fas fa-upload"></i> Upload</a></li>
    </div>
  </div>
</div>
    <section class="double_section">
        <aside >
            <h1>Repositories:</h1>
            <ul>
                <li>rep1</li>
                <li>rep2</li>
                <li>rep3</li>
                <li>rep4</li>
            </ul>
        </aside>
        <div class="editinfo">
            <img src="images/pngegg.png" alt="avatar">
            <div class="descriptionEdit">
                <p>A description about me</p>  <hr/> <br>
                <input type="text" id="description" placeholder="This is my description...">
                <br><br>
            </div> 
            <br><br>
            <input type="text" id="name" placeholder="Username">
            <br><br><br><br><br>
            <p style="text-align: center;"> Tell us your status: </p>
            <br><br>
            <div class="status">
            <p style=" display:inline;  cursor:pointer; color:green; padding-right:100px;">Hi there! I'm using Paste It!</p>
            <p style=" display:inline; text-decoration:underline; cursor:pointer; color:yellow; padding-right:100px;"> I'd be right back!</p>
            <p style=" display:inline; text-decoration:underline; cursor:pointer; color:red"> I'm busy!</p>
            </div>
            <br><br><br><br><br><br>
            <button style="margin-left:280px;">Save changes</button>
            <br><br><br>
            <button>Cancel</button>

        </div>
        
    </section>
    
    
    <section class="lower_section">
        lower section
    </section>
    <footer>footer</footer>
</body>
</html>
