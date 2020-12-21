<!DOCTYPE html>
<html lang = "en">

	<head>
		<meta charset = "utf-8">
		<title>All Customers</title>

		<link rel = "stylesheet" type = "text/css" href = "css/style2.css">
		<!--<script type = "text/javascript" src = "js/script.js"></script>-->
	</head>

	<body>
		<header>
			<nav class = "nav_cust">
				<a id = "nav_left" href = "index.html">Home</a>
				<a href = "all_transactions.php">All Transactions</a>
			</nav>
		</header>

		<main>			
			<article class = "art_cust">
				<h1 class = "hp_cust">List of all Customers</h1>
				<p class = "hp_cust">Please click on your name to transfer money from your account to the recipient.</p>
				
				<table class = "tcust">
					<tr>
					<th>Id</th>
					<th>Customer Name</th>
					<th>Email</th>
					<th>Bank</th>
					<th>City</th>
					<th>Balance</th>
					</tr>

				<?php
					include "dbconnect.php";

					$sql = "SELECT * FROM users";

					$result = mysqli_query($conn, $sql);
					$num = mysqli_num_rows($result);

					if($num > 0)
					{
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr><td>" .$row["id"]. "</td><td><a href = \"transfer.php?link=" .$row["name"]. "\">" .$row['name']. "</td><td>" .$row["email"]. "</td><td>" .$row["bank"]. "</td><td>" .$row["city"]. "</td><td>" .$row['balance']. "</td></tr>";
						}
					}

					mysqli_close($conn);
				?>

				</table>

			</article>
		</main>

		<footer>
			
		</footer>
	</body>
</html>