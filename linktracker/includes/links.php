<?php 
  
  	include ("../class/require.php");


        $currentpage = $_SERVER['QUERY_STRING'];

		//Get active links
		$get_links = mysql_query("SELECT * FROM links WHERE slt_link_userid = '$userid'");
			$get_links_amount = mysql_num_rows($get_links);
			

			if($get_links_amount > 0) {
				//if we find rows
				while($row = mysql_fetch_assoc($get_links)) {
					echo '<div class="well">';
					echo '<p>Link: <b>'.$row["slt_link_baseurl"].' <a class="btn btn-default btn-xs" target="_blank" href="'.$row["slt_link_baseurl"].'">Visit</a></b></p>';
					echo '<p>Tracking Link: <b>'.$row["slt_link_url"].'</b></p>';
					echo '<p>Total Unique Visitors: <b>'.$row["slt_link_total"].'</b></p>';
					echo '<a style="display:inline;" class="btn btn-info btn-xs" href="'.$currentpage.'?src='.$row["slt_link_trackingid"].'">Stats</a>&nbsp;';
					echo '<form style="display:inline;" method="POST" action="includes/delete_link.php">
					<input type="hidden" name="tid" value="'.$row["slt_link_trackingid"].'">
					<button style="font-size:13px;" class="btn btn-danger btn-xs" type="submit" value="delete"><i class="fa fa-trash" aria-hidden="true"></i></button></form>';
					echo '</div>';
				}
			} else {
				//if there are none
				echo '<p style="padding:20px;"><font color="red">Unfortunately</font>, no active links were found. You can create one above.</p>';
			}

?>