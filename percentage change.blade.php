<!DOCTYPE html>
<html lang="en">
        <!DOCTYPE html>
            <html>
                <head>
                    <title>
                        CMARS
                    </title>
                    <style>
                        .sidenav{
                            height:100%; 
                            width: 160px;
                            position: fixed;
                            z-index: 1;
                            top:0;
                            left: 0;
                            background-color:#9acd32;
                            padding-top:20px;
                        }
                        .sidenave a{
                            padding:6px 8px 6px 16px;
                            text-decoration: none;
                            font-size: 25px;
                            color: # 818181;
                            display: block;
                        }
                        
                            margin-left:200px;
                            padding:0px 10px;
                        }
                        
                    
                        @media screen and (max-heiht:450px){
                            .sidenave {padding-top:15px;}
                            .sidenav a{font-size:18px;}
                        }    
                        .main{
                            background-color:#ffa500;
                            
                            margin-left:155px;
                            padding:0px 10px;
                        }
                        
                        </style>
                </head>
        <body>
        <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CMARS') }}
        </h2>
    </x-slot>
            <div class="sidenav">
                <ul>

        <li><a  href="dashbord">
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a  href="health officer.blade.php">
                  
                    <p>HEALTH OFFICER</p>
                </a>
            </li>
            <li>
                <a href="patients.blade.php">
                  
                    <p>PATIENTS</p>
                </a>
            </li>
            <li>
                <a href="Hospitals.blade.php">
                    
                    <p>HOSPIIALS</p>
                </a>
            </li>
            <li>
                <a  href="payments.blade.php">
                    
                    <p>PAYMENTS</p>
                </a>
            </li>
            <li>
                <a  href="Treasury.blade.php">
                   <!-- <i class="nc-icon nc-pin-3"></i>-->
                    <p>TREASURY</p>
                </a>
            </li>
            <li>
                <a href="Summary.blade.php">
                   <!--<i class="nc-icon nc-bell-55"></i>-->
                    <p>SUMMARY</p>
                </a>
          
            </li>
        </ul>
    </div>
           <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                  
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                           
                            </li>
                          
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                           
                           <li class="nav-item dropdown">
                               
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class=main>
         
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">PERCENTAGE</h4>
                                    <p class="card-category"></p>
                                </div>
                                
                                    
                            </div>
                        </div>
            <footer class="footer">
                we care
                </x-app-layout>   
</body>

</html>
