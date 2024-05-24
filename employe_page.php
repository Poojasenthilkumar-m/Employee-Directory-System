<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Directory</title>
<style> body{
background-color: lightcyan;
}
table { width: 100%;
border-collapse: revert-layer;
table-layout: const packageName = require('packageName');
}
th, td {
border: 1px solid #ddd; padding: 8px;
text-align: left;
text-emphasis-color: rgba(90, 200, 160, 0.8); background-color: lightgreen;
}
tr:nth-child(even) { background-color: lightblue; color: darkblue;
}
</style>
</head>
 
<body><center>
<h2>Employee Directory</h2>
<?php
// Load XML file
$xml = simplexml_load_file('employees.xml');
// Display search form echo '
<form method="GET">
<input type="text" name="search" placeholder="Search...">
<button type="submit">Search</button>
</form>;
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = strtolower($_GET['search']);
    $filteredEmployees = $xml->xpath("//employee[contains(translate(name, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), '$search')
    or contains(translate(department, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), '$search')
    or contains(translate(job_title, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), '$search')]");
    if ($filteredEmployees) {echo '<h3>Search Results:</h3>'; echo '<table>';
    echo '<tr><th>Name</th><th>Department</th><th>Job Title</th><th>Email</th><th>Phone</th><th>Office Location</th></tr>';
    foreach ($filteredEmployees as $employee) { echo '<tr>';
    echo '<td>' . $employee->name . '</td>';
    echo '<td>' . $employee->department . '</td>'; echo '<td>' . $employee->job_title . '</td>'; echo '<td>' . $employee->email . '</td>';
    echo '<td>' . $employee->phone . '</td>';
    echo '<td>' . $employee->office_location . '</td>'; echo '</tr>';
    }
    echo '</table>';
     
    } else {
    echo '<p>No results found.</p>';
    }}
    ?>
    </center><style> h3{
    color: rgb(13);
    }
    table { border=1;
    }
    </style>
    <h3>All Employees:</h3>
    <table><tr><th>Name</th>
    <th>Department</th>
    <th>Job Title</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Office Location</th>
    </tr>
    <?php // Display all employees
    foreach ($xml->employee as $employee) { echo '<tr>';
    echo '<td>' . $employee->name . '</td>';
    echo '<td>' . $employee->department . '</td>'; echo '<td>' . $employee->job_title . '</td>'; echo '<td>' . $employee->email . '</td>';
    echo '<td>' . $employee->phone . '</td>';
    echo '<td>' . $employee->office_location . '</td>'; echo '</tr>';
    }?>
    </table>
</body>
</html>
    
