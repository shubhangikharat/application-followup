<?php
class Interview {
	//missing static property, added static property to variable
	public static $title = 'Interview test';
}
$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';
$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);
$person = $_POST['person'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

	<h1><?=Interview::$title;?></h1>

	<?php
	// Print 10 times
	//loop condition was wrong,switch the 0 and 10 in for loop
	for ($i=0; $i<10; $i++) {
		//wrong format for echo, fixed concatination syntax for echo(we can also use echo "<p> $lipsum </p>";)
		echo '<p>'.$lipsum.'</p>';
	}
	?>

	<hr>

	<!-- use post instead of get for sensetive data -->
	<form method="post" action="<?=$_SERVER['REQUEST_URI'];?>">
		<!-- added inputs required -->
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName" required></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName" required></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email" required></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php if ($person): ?>
		<!-- added htmlspecialchars -->
		<p><strong>Person</strong> <?=htmlspecialchars($person['first_name']);?>, <?=htmlspecialchars($person['last_name']);?>, <?=htmlspecialchars($person['email']);?></p>
	<?php endif; ?>

	<hr>

	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($people as $person): ?>
				<tr>
					<!-- had wrong format for array, it was for object. Fixed format to get array data -->
					<!-- added htmlspecialchars -->
					<td><?=htmlspecialchars($person['first_name']);?></td>
					<td><?=htmlspecialchars($person['last_name']);?></td>
					<td><?=htmlspecialchars($person['email']);?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>