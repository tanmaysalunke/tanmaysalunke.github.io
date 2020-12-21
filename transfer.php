<!DOCTYPE html>
<html lang = "en">

	<head>
		<meta charset = "utf-8">
		<title>Fund Transfer</title>

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
			<article class = "art_transfer">
				<h1 class = "hpcust">Transfer Money</h1>
				<form action = "add_trans.php" method = "POST"> 

					<label for = "from_user">From:</label>
					<br>
					<input type="text" name="from_user" id = "from_user" class = "inputs"
						<?php
							$nm = $_REQUEST['link'];
							echo "value = '" .$nm. "'";
						?>
					readonly>

					</select>
					<br><br>

					<label for = "to_user">To:</label>
					<br>
					<select id = "to_user" name = "to_user" class = "inputs">
						<option value = "null">Select a customer</option>
						
						<?php
							include "dbconnect.php";
							
							$sql = "SELECT name FROM users";
							
							$result = mysqli_query($conn, $sql);
							$num = mysqli_num_rows($result);
     					
     					while ($row = mysqli_fetch_assoc($result))
     					{
     						if($_REQUEST['link'] != $row['name'])
     							echo "<option value=\"" .$row['name']. "\">" .$row['name']. "</option>";
    					}

    					$conn->close();
						?>

					</select>
					<br><br>

					<label for = "amount">Amount:</label>
					<br>
					<input type = "number" name="amount" id = "amount" min = "1" class = "inputs">
					<br><br>

					<input type = "submit" name = "transfer" class = "inputs" id = "transfer_button" value = "Transfer">

				</form>
			</article>
		</main>

		<footer>
			
		</footer>

	</body>
</html>