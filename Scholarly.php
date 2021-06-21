<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/Style.css">
</head>
<body prefix="schema: http://schema.org">
    <header>
        <nav>
            <ul>
                <li><a href="Index.php"> Home</a></li>
                <li><a href="AboutUs.php"> About Us</a></li>
                <li><a href="Contact.php"> Contact</a></li>
                <li><a href="Scholarly.php"> Documentation</a></li>
                
                
            </ul>
            <div class="col2">
                <ul>
                    <li>
                        <a href="SignIn.html">Sign In</a>
                    </li>
                    <li>
                        <a href="Register.html">Sign Up</a>
                    </li>
                </ul>
                <input class="searchbar" type="text" placeholder="Search..">
            </div>
            
            
            
        </nav>
        <img src="images/Logoo.png" alt="Logo" width="200" height="80">
    </header>


    <!-- Cuprins-->
    <section class="content">

    
    <ol>
        
        <li>
            <a href="#introduction">Introduction</a>
            <ol>
                <li><a href="#purpose">Purpose</a></li>
                <li><a href="#documentConventions"> Document Conventions</a></li>
                <li><a href="#intendedAud"> Intended Audience </a></li>
                <li><a href="#productScope"> Product Scope</a></li>
                <li><a href="#references">References</a></li>
            </ol>
        </li>
        <li>
            <a href="#overallDescription">Overall Description</a>
            <ol>
                <li><a href="#productPerspective"> Product perspective</a></li>
                <li><a href="#productFunctions"> Product Functions</a></li>
                <li><a href="#operatingEnvironment">Operating Environment</a></li>
                <li><a href="#design"> Design and Implementation Constraints </a></li>
                <li><a href="#assumptions"> Assumptions and Dependencies </a></li>

            </ol>
        </li>
        <li>
            <a href="#externalRequirements"> External Interface Requirements</a>
            <ol>
                <li><a href="#userInterface"> User interface</a></li>
                <li><a href="#hardwareInterfaces"> Hardware Interfaces</a></li>
                <li><a href="#softwareInterfaces"> Software interfaces</a></li>
                <li><a href="#communicationInterface">Communication interfaces</a></li>
            </ol>
        </li>
        <li>
            <a href="#systemFeatures">System Features</a>
            <ol>
                <li><a href="#register">Register</a></li>
                <li><a href="#login">Log in</a></li>
                <li><a href="#uploadCode">Upload code</a></li>
                <li><a href="#editProject">Edit Project</a></li>
                <li><a href="#editPrivacy">Edit Privacy</a></li>
                <li><a href="#syntaxHighlights">Syntax Highlights</a></li>
                            </ol>
        </li>
        <li>
            <a href="#nonfunctionalFeatures">Nonfunctional Features</a>
            <ol>
                <li><a href="#security">Security</a></li>
            </ol>
        </li>
        <li>
            <a href="#bibliography">Bibliography</a>
        </li>
        <li>
            <a href="#authors">Authors</a>
        </li>
    </ol>

    <section id="introduction">
        <h2>Introduction</h2>
        <h3 id="purpose">Purpose</h3>
        <p>
            Paste-It is an web application for programmers. The application is used
            to share code and projects between team members, students and all kind of programmers.
        </p>
        <h3 id="documentConventions"> Document Conventions</h3>
        <p>
            Each code will be colored depending of a dictionary (sintax highlighting). The dictionary is represented by the language of programming chosen by the owner of the post.
        </p>
        <h3 id="intendedAud"> Intended Audience </h3>
        <p>
            This web application is intended for any user that wants to share some codes for different types of projects, or he just wants to learn new ways of coding.
        </p>
        <h3 id="productScope"> Product Scope</h3>
        <p>
            The purpose of this application is to easily share information between any kind of users. For authentificated users, we provide the managment of their own posts (it will be possible to edit and delete previous posts or attach various attributes), the ability to select other users who are allowed to edit the post, also the period of time that the post will be available and maintain a history to roll back to previous versions. For unauthenticated users, the posts will always be public and maintained for only 30 days.
        </p>
        <h3 id="references"> References</h3>
        <p>
            The major reference is the web-based platform called Github , which has the same scope, to simplify the process of working with other people and that is making it easy to collaborate on projects : <a href="https://github.com/">github.com</a>
        </p>
    </section>

    <section id="overallDescription">
        <h2>Overall description</h2>
        <h3 id="productPerspective"> Product Perspective</h3>
        <p>
            The product is a new, self-contained one, inspired in many ways by an already existing platform because of it's similar scope, and is built for university purposes.
        </p>
        <h3 id="productFunctions">Product Functions</h3>
        <ul style="list-style-type:disc">
            <li> Register and Log in </li>
            <li> Uploading documents </li>
            <li> Searching and rating other users's codes </li>
            <li> Keeping history of activity and users's contribution to the platform</li>
            <li> Setting the personal profile and individual attributes</li>
            <li> The possibility to navigate without an account</li>
            <li> Being always in touch with the best codes</li>
        </ul>
        <h3 id="operatingEnvironment"> Operating Environment</h3>
        <p>
            The software will operate in any environment and will be available for all operating systems.
        </p>
        <h3 id="design"> Design and Implementation Constraints</h3>
        <ul style="list-style-type:disc">
            <li>Interface built with only HTML and CSS</li>
            <li>PHP database</li>
            <li>No helping tools</li>
            <li>Limited language options(HTML,CSS,Javascript)</li>
        </ul>
    </section>
    <section id="externalRequirements">
        <h2>External Interface Requirements</h2>
        <h3 id="userInterface"> User Interfaces</h3>
        <p>The user will have the possibility to sign in to his account </p>
        <img src="images/signin.png" alt="ss" style="width:80%;height:40%">
        <p>(or to register through a similar page), or to navigate without an account, but with some limitations. From here, he can search for codes, other users, rate their work and learn. He can also upload his work, but an unauthenticated user can't set his own attributes for the post.</p>
        <img src="images/upload.png" alt="ss" style="width:80%;height:40%">
        <p>Also, an user signed in, has the benefit to set his own profile , besides his posts.</p>
        <img src="images/edit.png" alt="ss" style="width:80%;height:50%">
       
        <h3 id="hardwareInterfaces"> Hardware, Software and Communication Interfaces</h3>
        <p>
            The functions and features will be made using PHP database and Javascript.
        </p>
    </section>

    <section id="systemFeatures">
        <h2>System Features</h2>
        <h3 id="register"> Register</h3>
        <p>
            The "Register" feature will let the user to create an account with his email, username and password so he can connect to the web application.
        </p>
        <h3 id="login"> Log In</h3>
        <p>
            The "Log In" feature will let the user to sign in to application with his created accound.
        </p>
        <h3 id="uploadCode"> Upload Code</h3>
        <p>
            The "Upload Code" feature will let an Signed In (or not) user to upload his project. He will can make the uploaded code private (so he will be the only one that can acces it) or he can make it public so everyone can see his code.
        </p>
        <h3 id="editProject"> Edit Project</h3>
        <p>
            The "Edit Project" feature will let the user to make changes to his posted project.
        </p>
        <h3 id="editProfile"> Edit Profile</h3>
        <p>
            The "Edit Profile" feature will let the user to change the characteristics of his profile, such as name, avatar, description and status. 
        </p>
        <h3 id="syntaxHighlights"> Syntax Highlights</h3>
        <p>
            The "Syntax Highlights" feature will make the user' s code colored according to a language dictionary.
        </p>
        
    </section>

    <section id="nonfunctionalFeatures">
        <h2 id="security"> Security</h2>
        <p>
        The account security is provided by each user's choice for password.</p>
    </section>

    <section id="bibliography">
        <h2>Bibliography</h2>
    </section>

    <section id="authors">
        <h2>Authors</h2>
        Gruia Carmen-Andreea
        <br>
        Hirean Catalin-Alexandru
        <br>
        Mitrof Denis-Ozgean
    </section>




</section>


</body>
</html>
