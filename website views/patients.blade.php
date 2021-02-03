<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>
        CMARS Patients
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

        <a href="/patients" style="display: inline-block; position: relative; left: -20px; width: 160px; padding-left: 20px; color: black; font-weight: bold; background-color: white;">
            Patients
        </a><br>

        <a href="/variation" class="indent">
            Variation
        </a><br>

        <a href="/percentage change" class="indent">
            Percentage change
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

    <h2>Patients</h2>

    <div class="main">

        <br><br>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Case Type</th>
                <th>Symptom Category</th>
                <th> Enrolloment Date</th>
                <th> Officer</th>
                <th> Hospital</th>
                <th> Release Date</th>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <br><br>
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

        Toatl number of patients:
        <input type="text" name="pateintsNo">
        <br><br>
    </div>

</body>
</html>