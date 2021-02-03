<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <title>
        CMARS Dashboard
    </title>
<link href="{{asset('css/main design.css')}}" rel="stylesheet"/>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <h1>COVID-19 CASE MANAGEMENT AND REPORTING TOOL FOR UGANDA</h1>
   

    <nav>
        <strong class="indent">MENU</strong><br>
        <a href="dashboard.html" style="display: inline-block; position: relative; left: -20px; width: 160px; padding-left: 20px; color: black; font-weight: bold; background-color: white;">
            Dashboard
        </a><br><br>

        <a href="/health officers">
            Health officers
        </a><br><br>

        <a href="/patients">
            Patients
        </a><br><br>

        <a href="/Hospitals">
            Hospitals
        </a><br><br>

        <a href="/payments">
            Payments
        </a><br><br>

        <a href="/Treasury">
            Treasury
        </a><br><br>
    </nav>

    <h2>Dashboard</h2><br>
   

    <div class="main">
        Month:
        <select name="month">
            <option value="Jan">January</option>
            <option value="Feb">February</option>
            <option value="Mar">March</option>
            <option value="Apr">April</option>
            <option value="May">May</option>
            <option value="Jun">June</option>
            <option value="Jul">July</option>
            <option value="Aug">August</option>
            <option value="Sept">September</option>
            <option value="Oct">October</option>
            <option value="Nov">November</option>
            <option value="Dec">December</option>
        </select>
        <br><br>

        Total number of patients:
        <input type="text" name="pateintsNo">
        <br><br>

        Total amount in treasury:
        <input type="text" name="treasuryAmount">
        <br><br>

        <table>
            <tr>
                <td colspan="2"></td>
                <th>Number of patients</th>
                <th>Number of health officers</th>
            </tr>

            <tr>
                <th rowspan="3"><strong>Hospital</strong></th>
                <td>General</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Regional</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>National</td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    
    
  
</body>
</html>