  
  <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="category.php">
                        Home
                    </a>
                </li>
                <li>
                    <a href="category.php">Access Authority</a>
                </li>
                <li>
                    <a href="employer.php">Employer/ Business Register</a>
                </li>
                <li>
                    <a href="employee.php">Site Induction Register</a>
                </li>
                <li>
                    <a href="site_location.php">Site Locations</a>
                </li>
                  <li>
                    <a style="cursor: pointer;">Email Settings</a>
                    <ul class="sub_list">
                        <li><a href="email_settings.php">Email Setting</a>
                        </li>
                        <li><a href="">Email Message</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </div>

        <style>
            
            /*!
 * Start Bootstrap - Simple Sidebar HTML Template (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

/* Toggle Styles */

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    /*z-index: 1000;*/
    position: absolute;
      
    left: 250px;
    width: 0;
    height: 70%;


    margin-left: -250px;
    overflow-y: auto;
    background: #000;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
    width: 250px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}

/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
        display: block;
    text-decoration: none;
    color: #fcf8e3;
    font-size: 16px;
    font-family: arial;
    margin-bottom: 12px;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    color: #9d9d9d;
    background: rgba(255,255,255,0.2);
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;

}

.sidebar-nav > .sidebar-brand a {
    color: grey;
}

.sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 250px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 290px;
            margin-top: 165px;
            background:  background-image:-moz-linear-gradient(left top, #0f0f0f 21%, #09141a 33%,#071217 50%,#010203 61%,#000000 63%);
background-image:linear-gradient(left top, #0f0f0f 21%, #09141a 33%,#071217 50%,#010203 61%,#000000 63%);
background-image:-webkit-linear-gradient(left top, #0f0f0f 21%, #09141a 33%,#071217 50%,#010203 61%,#000000 63%);
background-image:-o-linear-gradient(left top, #0f0f0f 21%, #09141a 33%,#071217 50%,#010203 61%,#000000 63%);
background-image:-ms-linear-gradient(left top, #0f0f0f 21%, #09141a 33%,#071217 50%,#010203 61%,#000000 63%);
 background-image:-webkit-gradient(linear, left top, right bottom, color-stop(21%,#0f0f0f), color-stop(33%,#09141a),color-stop(50%,#071217),color-stop(61%,#010203),color-stop(63%,#000000));
            border-radius: 2px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0;
    }

    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
}

        </style>