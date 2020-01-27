<?php include('connect.php');?>
<html>
<head>
<title>Functional Dependency</title>
</head>
<h2>Data of Table</h2>
<table class='table table-hover table-recently-t'>
<thead>
  <tr>
    <th scope='col'>#</th>
    <th scope='col' style="padding-right:25px;padding-left:25px;">ch1 A</th>
    <th scope='col' style="padding-right:25px;padding-left:25px;">ch2 B</th>
    <th scope='col' style="padding-right:25px;padding-left:25px;">ch3 C</th>
    <th scope='col' style="padding-right:25px;padding-left:25px;">ch4 D</th>
    <th scope='col' style="padding-right:25px;padding-left:25px;">ch5 E</th>
  </tr>
</thead>
<?php
	$bo="SELECT * FROM `tbl`";
	$boo= $conn->query($bo);
	foreach($boo as $rows)
	{
		echo "<tr>
		  <th scope='col'>#</th>
		  <th scope='col'>".$rows["ch1"]."</th>
		  <th scope='col'>".$rows["ch2"]."</th>
		  <th scope='col'>".$rows["ch3"]."</th>
		  <th scope='col'>".$rows["ch4"]."</th>
		  <th scope='col'>".$rows["ch5"]."</th>
	 	 </tr>";
	}
?>
</table>
<hr>
<?php
$number="SELECT count(`id`) FROM `tbl`";
$numberrun=$conn->query($number);
$numt=$numberrun->fetchColumn();
$numt++;


?>
<hr>
<h3>relation</h3>
<?php
	$bo="SELECT * FROM `relation`";
	$boo= $conn->query($bo);
	foreach($boo as $rows)
	{
		echo $rows["A"]."--->".$rows["B"]."<br>";
	}
?>
<hr />
<h2> Relation number 1 (one by one) </h2>
<?php
	for($i=1;$i<$numt;$i++){
		for($j=$i;$j<$numt;$j++){
			if($i!=$j){
				$bo="SELECT * FROM `tbl`";
				$boo= $conn->query($bo);
				foreach($boo as $rows)
				{	
					$num=0;
					echo $rows[$i]."-->".$rows[$j]."<br>";	
					$y="SELECT count(`ch".$i."`) FROM `tbl` where`ch".$i."`='".$rows[$i]."' ";
					$yy=$conn->query($y);
					$num=$yy->fetchColumn();
					echo $num."<br>";
					if($num>1)
					break;
				}  //foreach($boo as $rows)
				if($num<=1){
					$p="SELECT * FROM `relation` where`A`='ch".$i."' and `B`='ch".$j."' ";
					$pp=$conn->query($p);
					$pnum=$pp->fetchColumn();
					if($pnum<1){
						$o="INSERT INTO `relation`(`id`, `A`, `B`) VALUES (null,'ch".$i."','ch".$j."')";
						$oo=$conn->query($o);
					} //if($pname>1){
					}  //if($num<=1){
			}  //if($i!=$j){
			echo "<br>";
		}  //	for($j=$i;$j<=5;$j++){
		echo "----------------<br>";
	}   //  for($i=1;$i<6;$i++){
?>
<hr />
<h2> Relation number 2 (two by one) </h2>
<?php
	for($i=1;$i<$numt;$i++){
		for($j=$i;$j<$numt;$j++){
			for($k=1;$k<=5;$k++){
			if($i!=$j && $i!=$k && $j!=$k){
				$bo="SELECT * FROM `tbl`";
				$boo= $conn->query($bo);
				foreach($boo as $rows)
				{	
					$num=0;
					echo $rows[$i]." , ".$rows[$j]."---->".$rows[$k]."<br>";		
					$y="SELECT count(`ch".$i."`) FROM `tbl` where`ch".$i."`='".$rows[$i]."' and `ch".$j."`='".$rows[$j]."'  ";
					$yy=$conn->query($y);
					$num=$yy->fetchColumn();
					echo $num."<br>";
					if($num>1)
					break;
				}//foreach($boo as $rows)
				if($num<=1){
					$p="SELECT * FROM `relation` where`A`='ch".$i." , ch".$j."' and `B`='ch".$k."' ";
					$pp=$conn->query($p);
					$pnum=$pp->fetchColumn();
					if($pnum<1){
						$o="INSERT INTO `relation`(`id`, `A`, `B`) VALUES (null,'ch".$i." , ch".$j."','ch".$k."')";
						$oo=$conn->query($o);
					} //if($pname>1){
					}  //if($num<=1){
				echo "-*-*-*-*-*-*  <br>";
			} //if($i!=$j && $i!=$k && $j!=$k){
			}//for($k=1;$k<=3;$k++){
			echo "<br>";
		}//for($j=1;$j<=5;$j++){
		echo "---**---- end colon--------- <br>";
	}//for($i=1;$i<=5;$i++){
?>
<hr />
<h2> Relation number 3 (three by one) </h2>
<?php
	for($i=1;$i<$numt;$i++){
		for($j=$i;$j<$numt;$j++){
			for($k=$j;$k<$numt;$k++){
				for($m=1;$m<$numt;$m++){
					if($i!=$j && $i!=$k && $j!=$k && $i!=$m && $j!=$m && $k!=$m){
						$bo="SELECT * FROM `tbl`";
						$boo= $conn->query($bo);
						foreach($boo as $rows)
						{	
							$num=0;
							echo $rows[$i]." , ".$rows[$j]." , ".$rows[$k]."---->".$rows[$m]."<br>";	
							$y="SELECT count(`ch".$i."`) FROM `tbl` where`ch".$i."`='".$rows[$i]."' and `ch".$j."`='".$rows[$j]."'  and `ch".$k."`='".$rows[$k]."' ";
							$yy=$conn->query($y);
							$num=$yy->fetchColumn();
							echo $num."<br>";
							if($num>1)
							break;
						}//foreach($boo as $rows)
						if($num<=1){
							$p="SELECT * FROM `relation` where`A`='ch".$i." , ch".$j." , ch".$k."' and `B`='ch".$m."' ";
							$pp=$conn->query($p);
							$pnum=$pp->fetchColumn();
							if($pnum<1){
								$o="INSERT INTO `relation`(`id`, `A`, `B`) VALUES (null,'ch".$i." , ch".$j." , ch".$k."','ch".$m."')";
								$oo=$conn->query($o);
							} //if($pname>1){
							}  //if($num<=1){
						echo "-*-*-*-*-*-*  <br>";
					} //if($i!=$j && $i!=$k && $j!=$k){
				}//for($m=1;$m<=5;$m++){
			}//for($k=1;$k<=3;$k++){
			echo "<br>";
		}//for($j=1;$j<=5;$j++){
		echo "---**---- end colon---**------ <br>";
	}//for($i=1;$i<=5;$i++){
?>
<hr />
<h2> Relation number 4 (fore by one) </h2>
<?php
	for($i=1;$i<$numt;$i++){
		for($j=$i;$j<$numt;$j++){
			for($k=$j;$k<$numt;$k++){
				for($m=$k;$m<$numt;$m++){
					for($w=1;$w<$numt;$w++){
						if($i!=$j && $i!=$k && $j!=$k && $i!=$m && $j!=$m && $k!=$m && $i!=$w && $j!=$w && $k!=$w && $m!=$w){
							$bo="SELECT * FROM `tbl`";
							$boo= $conn->query($bo);
							foreach($boo as $rows)
							{	
								$num=0;
								echo $rows[$i]." , ".$rows[$j]." , ".$rows[$k]." , ".$rows[$m]."---->".$rows[$w]."<br>";	
								$y="SELECT count(`ch".$i."`) FROM `tbl` where`ch".$i."`='".$rows[$i]."' and `ch".$j."`='".$rows[$j]."'  and `ch".$k."`='".$rows[$k]."' and `ch".$m."`='".$rows[$m]."' ";
								$yy=$conn->query($y);
								$num=$yy->fetchColumn();
								echo $num."<br>";
								if($num>1)
								break;
								}//foreach($boo as $rows)
							if($num<=1){
								$p="SELECT * FROM `relation` where`A`='ch".$i." , ch".$j." , ch".$k." , ch".$m."' and `B`='ch".$w."' ";
								$pp=$conn->query($p);				  
								$pnum=$pp->fetchColumn();
								if($pnum<1){ 
									$o="INSERT INTO `relation`(`id`, `A`, `B`) VALUES (null,'ch".$i." , ch".$j." , ch".$k." , ch".$m."','ch".$w."')";
									$oo=$conn->query($o);
								} //if($pname>1){
								}  //if($num<=1){
							echo "-*-*-*-*-*-*  <br>";
						} //if($i!=$j && $i!=$k && $j!=$k){
					}//for($w=0;$w<=5;$w++){
				}//for($m=1;$m<=5;$m++){
			}//for($k=1;$k<=3;$k++){
			echo "<br>";
		}//for($j=1;$j<=5;$j++){
		echo "---**---- end colon---**------ <br>";
	}//for($i=1;$i<=5;$i++){
?>
<hr />




<body>
</body>
</html>
