<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>
        CMARS Payments
    </title>
    <link href="{{asset('css/main design.css')}}" rel="stylesheet"/>
    
</head>

<body>
    <h1>COVID-19 CASE MANAGEMENT AND REPORTING TOOL FOR UGANDA</h1>

    <nav>
        <strong class="indent">MENU</strong><br>
        <a href="/dashboard">
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

        <a href="/payments" style="display: inline-block; position: relative; left: -20px; width: 160px; padding-left: 20px; color: black; font-weight: bold; background-color: white;">
            Payments
        </a><br>

        <a href="/per health officer" class="indent">
            Per health officer
        </a><br><br>

        <a href="/Treasury">
            Treasury
        </a><br><br>
    </nav>

    <h2>Payments</h2>

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

        Amount available:
        <input type="text" name="patientsNo">
        <br><br>
        
        <div>
            <table>
                <tr>
                    <td></td>
                    <th>Allowance</th>
                </tr>

                <tr>
                    <td>Director national referral hospital</td>
                    <td></td>
                </tr>

                <tr>
                    <td>System adminstrator</td>
                    <td></td>
                </tr>

                <tr>
                    <td>Referral superintendent</td>
                    <td></td>
                </tr>

                <tr>
                    <td>Health officer</td>
                    <td></td>
                </tr>

                <tr>
                    <td>General hospital head health officer</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>