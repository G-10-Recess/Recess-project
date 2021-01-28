

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
                        .main{
        
                            background-color:#ffa500;
                            margin-left:155px;
                            padding:0px 10px;
                        }
                        
                    
                        @media screen and (max-heiht:450px){
                            .sidenave {padding-top:15px;}
                            .sidenav a{font-size:18px;}
                        }    
                        .table{
                            background-color:#ffa500;
                        }
                        
                        </style>
                </head>
        <body>
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
          
        <div class="main">
         
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-20">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add health Officer</h4>
                                </div>
                                <div class="card-body"> <div class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card strpied-tabled-with-hover">
                                                    
                                                    <div class="card-body table-full-width table-responsive">
                                                        <table class="table table-hover table-striped">
                                                            <thead>
                                                                <th>NIN</th>
                                                                <th>Name</th>
                                                                <th>Gender</th>
                                                                <th>Hospital</th>
                                                                <th>position</th>
                                                                <th>No. of patients treated</th>
                                                               
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td> 
                                                                        <input type="textbox"></td>
                                                                    <td>  <input type="textbox"> </td>
                                                                    <td>  <input type="textbox"></td>
                                                                    <td>  <input type="textbox"></td>
                                                                    <td> <input type="textbox"> </td>
                                                                    <td> <input type="textbox"> </td>
                                                                   
                                                                </tr>
                                                                <tr>
                                                                    <td> <input type="textbox"></td>
                                                                    <td><input type="textbox"> </td>
                                                                    <td><input type="textbox"> </td>
                                                                    <td> <input type="textbox"></td>
                                                                    <td><input type="textbox"> </td>
                                                                    <td><input type="textbox"> </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="textbox"> </td>
                                                                    <td><input type="textbox"> </td>
                                                                    <td><input type="textbox"> </td>
                                                                    <td><input type="textbox"> </td>
                                                                    <td><input type="textbox"> </td>
                                                                    <td><input type="textbox"> </td>
                                                                    
                                                                </tr>
                                                                
                                                              
                                                            </tbody>
                                                            
                                                        </table>
                                                      <!-- <div>
                    
                                                        </div>
                                                        <div>
                                                            Total number of patients:
                                                        <input type="text"></text>
                                                            <div class="clearfix">
                                                            </div>
                                                    </div>-->
                                                </div>
                                            </div>
                            
                                   
                                            <td>
                                                <dt>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">REGISTER</button>
                                        <div class="clearfix">
                                               </td>
                                             </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                       
            </footer>
        </div>
    </div>
    
</body>

</html>
