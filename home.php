<?php
	require('header.php');
	//phpinfo();
	function my_function(){
		echo 'My function was called';
	}
	my_function();
	function create_table($data){
		echo '<table border=\"1\">';
		reset($data); //Remember this is used to point to the beginning
		$value=current($data);
		while($value){
			echo "<tr><td>".$value."</td></tr>\n";
			$value=next($data);
		}
		echo "</table>";
	}
	$my_array=array('Line one.', 'Line two.', 'Line three.');
	create_table($my_array);
	
	function create_table2($data, $border=1, $cellpadding=4, $cellspacing=4){
		echo "<table border=\"".$border."\" cellpadding=\"".$cellpadding."\"
			cellspacing=\"".$cellspacing."\">";
		reset($data);
		$value=current($data);
		while ($value){
			echo "<tr><td>".$value."</td></tr>\n";
			$value=next($data);
		}
		echo "</table>";
	}
	create_table2($my_array,3,8,8);
	
	function fn(){
		$var="contents";
		echo $var;
	}
	fn();
	
	function fn2(){
		//echo "inside the function, \$var=".$var."<br />";
		$var="contents 2";
		echo "inside the function, \$var=".$var."<br />";
	}
	$var="contents 1";
	fn2();
	echo "outside the function, \$var=".$var."<br />";
	
	function increment(&$value, $amount=1){
		$value=$value+$amount;
	}
	$value=10;
	increment($value);
	echo $value."<br />";
	
	function test_return(){
		echo "This statement will be executed";
		return;
		echo "This statement will never be executed";
	}
	
	function larger($x, $y){
		if((!isset($x)) || (!isset($y))){
			echo "This function requires two number.";
			return;
		}
		if ($x>=$y){
			echo $x."<br />";
		} else {
			echo $y."<br />";
		}		
	}
	$a=1;
	$b=2.5;
	$c=1.9;
	larger($a,$b);
	larger($c,$a);
	//larger($d,$a);
	
	function reverse_r($str){
		if(strlen($str)>0){
			reverse_r(substr($str,1));
		}
		echo substr($str, 0, 1);
		return;
	}
	
	function reverse_i($str){
		for($i=1; $i<=strlen($str); $i++){
			echo substr($str, -$i, 1);
		}
		return;
	}
	reverse_r('Hello');
	reverse_i('Hello');
		
?>
<!--page content -->
	<p>Welcome to the home of TLA Consulting.
	Please take some time to get to know us.</p>
	<p>We specialize in serving your business needs
	and hope to hear from you soon.</p>	
<?php
	require('footer.php');
?>