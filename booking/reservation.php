<?php

include_once('main.php');


if(isset($_GET['make_reservation']))
{
	$week = $_POST['week'];
	$day = $_POST['day'];
	$time = $_POST['time'];
	$counsellor_id = $_SESSION['counsellor_id'];
	
	
	echo make_reservation($week, $day, $time, $counsellor_id);
}
elseif(isset($_GET['delete_reservation']))
{
	$week = $_POST['week'];
	$day = $_POST['day'];
	$time = $_POST['time'];
	$counsellor_idx = $_SESSION['counsellor_id'];
	
	echo delete_reservation($week, $day, $time, $counsellor_idx);
}
elseif(isset($_GET['read_reservation']))
{
	$week = $_POST['week'];
	$day = $_POST['day'];
	$time = $_POST['time'];
	$counsellor_idx = $_SESSION['counsellor_id'];
	
	echo show_reservation_student_side($week, $day, $time, $counsellor_idx);
}
elseif(isset($_GET['read_reservation_details']))
{
	$week = $_POST['week'];
	$day = $_POST['day'];
	$time = $_POST['time'];
	$counsellor_idx = $_SESSION['counsellor_id'];
	
	echo read_reservation_details($week, $day, $time, $counsellor_idx);
}
elseif(isset($_GET['week'])) {
	$week = $_GET['week'];
	$counsellor_idx = $_SESSION['counsellor_id'];

	echo '<table id="reservation_table"><colgroup span="1" id="reservation_time_colgroup"></colgroup><colgroup span="7" id="reservation_day_colgroup"></colgroup>';

	$days_row = '<tr><td id="reservation_corner_td">
	<input type="button" class="blue_button small_button" id="reservation_today_button" value="Today"></td>
	<th class="reservation_day_th">Monday</th>
	<th class="reservation_day_th">Tuesday</th>
	<th class="reservation_day_th">Wednesday</th>
	<th class="reservation_day_th">Thursday</th>
	<th class="reservation_day_th">Friday</th>
	<th class="reservation_day_th">Saturday</th>
	<th class="reservation_day_th">Sunday</th></tr>';

	if($week == global_week_number)
	{
		echo highlight_day($days_row);
	}
	else
	{
		echo $days_row;
	}

	foreach($global_times as $time)
	{
		echo '<tr><th class="reservation_time_th">' . $time . '</th>';

		$i = 0;

		while($i < 7)
		{
			$i++;

			echo '<td><div class="reservation_time_div"><div class="reservation_time_cell_div" id="div:' . $week . ':' . $i . ':' . $time . '" onclick="void(0)">' . show_reservation_student_side($week, $i, $time, $counsellor_idx) . '</div></div></td>';
		}

		echo '</tr>';
	}

	echo '</table>';
}
else
{
	echo '</div><div class="box_div" id="reservation_div"><div class="box_top_div" id="reservation_top_div"><div id="reservation_top_left_div"><a href="." id="previous_week_a">&lt; Previous week</a></div><div id="reservation_top_center_div">Reservations for week <span id="week_number_span">' . global_week_number . '</span></div><div id="reservation_top_right_div"><a href="." id="next_week_a">Next week &gt;</a></div></div><div class="box_body_div"><div id="reservation_table_div"></div></div></div><div id="reservation_details_div">';
}

?>
