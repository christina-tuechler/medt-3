<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>A Web Page</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<style>
      td{
        padding: 10px;
      }
      th{
        padding:10px;
      }
  	</style>
</head>
<body>
	<div class="container">
		<header>
			<h1>Grid Generator</h1>
		</header>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" name="weekdays">
        <label><input type="checkbox" name="wday[]" value="sun"> Sunday</label><br>
        <label><input type="checkbox" name="wday[]" value="mon"> Monday</label><br>
        <label><input type="checkbox" name="wday[]" value="tue"> Tuesday</label><br>
        <label><input type="checkbox" name="wday[]" value="wed"> Wednesday</label><br>
        <label><input type="checkbox" name="wday[]" value="thu"> Thursday</label><br>
        <label><input type="checkbox" name="wday[]" value="fri"> Friday</label><br>
        <label><input type="checkbox" name="wday[]" value="sat"> Saturday</label><br>
        <label>Enter number of fields <input type="number" name="number" value="num"></label><br>
        <input type="submit" name="genButton" value="Generate...">
    </form>

    <hr>

    <?php
      if(isset($_GET['genButton']))
        { ?>
          <table>
            <thead>
              <tr>
                <th>Day</th>
                <?php
                  $number=$_GET['number'];
                  for($i=1; $i<=$number;$i++)
                  {
                    echo "<th>Event ".$i."</th>";
                  }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php
                  $i=1;
                    foreach($_GET['wday'] as $day)
                    {
                      echo "<tr>";
                      echo "<td>".$day."</td>";
                      for($j=1;$j<=$number;$j++)
                      {
                        echo "<td>event".$i.".".$j."</td>";

                      }
                      echo "</tr>";
                      echo "<br>";
                      $i++;
                     }  
              ?>
            </tbody>
          </table>
          <?php
        }?>
	</div>
</body>
</html>