<!DOCTYPE html>
<html lang = "en">

	<head>
		<meta charset = "utf-8">
		<title>Transfer Money | BBS</title>

		<link rel = "stylesheet" type = "text/css" href = "style1.css">
		<!--<script type = "text/javascript" src = "js/script.js"></script>-->

		<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&display=swap" rel="stylesheet">
	</head>

	<body>
		<header></header>

		<main>
			<?php
				include "dbconnect.php";

				if(isset($_POST["transfer"]))
				{
					$fname = mysqli_real_escape_string($conn, $_REQUEST['from_user']);
					$tname = mysqli_real_escape_string($conn, $_REQUEST['to_user']);
					$amt = mysqli_real_escape_string($conn, $_REQUEST['amount']);

					$sql0 = "SELECT * FROM users WHERE name='$fname'";
					$result0 = mysqli_query($conn, $sql0);

					while($row = mysqli_fetch_assoc($result0))
					{
						if($amt <= $row['balance'])
						{
							$sql = "INSERT INTO transaction (from_user, to_user, amount) VALUES ('$fname', '$tname', '$amt')";
							$result = mysqli_query($conn, $sql);
		

							$sql1 = "UPDATE users SET balance = balance + $amt WHERE name='$tname'";
							$result1 = mysqli_query($conn, $sql1);
		

							$sql2 = "UPDATE users SET balance = balance - $amt WHERE name='$fname'";
							$result2 = mysqli_query($conn, $sql2);

							echo "<script>
							alert('Transaction Complete!');
							window.location.href = 'customers.php';
							</script>";
						}
						else
						{
							echo "<script>
							alert('Insufficient Balance. Please try again.');
							window.location.href = 'customers.php';
							</script>";
						}
					}
				}

				mysqli_close($conn);
			?>
		</main>

		<footer>
			<p>Thank you for visiting!</p>
		</footer>

	</body>
</html>

