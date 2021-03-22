<?php

	require_once('db_global.php');

	

	$res = mysqli_query($link,"SELECT id FROM timeslots ORDER BY id") or die(mysqli_error($link));

	while($res1 = mysqli_fetch_assoc($res))

	{

		$res2 = mysqli_query($link,"SELECT user_id,goals_conceded,result FROM score_details WHERE season=2 AND timeslot_id=".$res1['id']." AND goals_conceded>0") or die(mysqli_error($link));

		while($res3 = mysqli_fetch_assoc($res2))

		{

			//echo "UID : ".$res3['user_id']." - GC : ".$res3['goals_conceded']." - Result : ".$res3['result']."</br>";

			$goals_conceded = $res3['goals_conceded'];

			$res4 = mysqli_query($link,"SELECT user_id FROM score_details WHERE season=2 AND result=".$res3['result']." AND timeslot_id=".$res1['id']." AND NOT user_id=".$res3['user_id']) or die(mysqli_error($link));

			while($res5 = mysqli_fetch_assoc($res4))

			{

				//echo "Points : -".$goals_conceded." UID : ".$res5['user_id']."</br>";

				$res6 = mysqli_query($link, "INSERT INTO points (point,user_id,top_scorer,top_goalkeeper) VALUES(-".$goals_conceded.",".$res5['user_id'].",0,0)") or die(mysqli_error($link));

			}

		}

	}

	die('Success. Points deducted for outfield players for goal conceded.');