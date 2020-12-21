<!DOCTYPE html>
<html lang = "en">

	<head>
		<meta charset = "utf-8">
		<title>All Transactions | BBS</title>

		<link rel = "stylesheet" type = "text/css" href = "css/style2.css">
		<!--<script type = "text/javascript" src = "js/script.js"></script>-->
	</head>

	<body>
		<header>
			<nav class = "nav_cust">
				<a id = "nav_left" href = "index.html">Home</a>
				<a href = "customers.php">View All Customers</a>
			</nav>
		</header>

		<main>			
			<article class = "art_trans">
				<h1 class = "hpcust">List of all Transactions</h1>
				
				<table class = "ttrans">
					<tr>
						<th>ID</th>
						<th>Sender</th>
						<th>Recipient</th>
						<th>Amount</th>
					</tr>

				<?php
					include "dbconnect.php";

					$sql = "SELECT * FROM transaction";

					$result = mysqli_query($conn, $sql);
					$num = mysqli_num_rows($result);

					if($num > 0)
					{
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr><td>" .$row['id']. "</td><td>" .$row['from_user']. "</td><td>" .$row['to_user']. "</td><td>" .$row['amount']. "</td></tr>";
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