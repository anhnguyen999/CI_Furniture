<p id="searchresults">
<?php

	$db = new mysqli('localhost:8081', 'root', '', 'san_pham_go');
	
	if(!$db) {
		echo 'ERROR: Could not connect to the database.';
	} else {
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) {
				$query = $db->query("SELECT * FROM san_pham WHERE name LIKE '%" . $queryString . "%' LIMIT 8");
				
				if($query) {


					while ($result = $query ->fetch_object()) {
						echo '<span class="category">'.$result->tensanpham.'</span>';
	         			echo '<img src="hinhsanpham/'.$result->hinh.'" alt="" />';
	         		}

				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} 
		}
	}
?>
</p>