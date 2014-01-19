<?php
    // request.php?request=ldoor&id=*password*
		
	if(isset($_POST['request']) && ($_POST['request'] == "ldoor") &&
		isset($_POST['id'])) {
		toggleLDoor();
	} elseif(isset($_POST['request']) && ($_POST['request'] == "rdoor") &&
		isset($_POST['id'])){
		toggleRDoor();
	} else{
		echo "houston we have a problem";
	}
	
	function checkUser() {
		//echo "Check user";
		$id = (string)$_POST['id'];

		if($id != "blargh") {
			return false;
		} else {
			return true;
		}
	}
	
	function toggleLDoor() {
		if (!checkUser()) {
			echo "no";
		} else {
			echo "left";
			// This is for the Java version that is really slow
			//shell_exec("sudo java -classpath .:classes:/opt/pi4j/lib/'*' lDoor");
			// execute script to open left door
			exec("./lDoor.sh");
		}
	}
	
	function toggleRDoor() {
		if (!checkUser()) {
			echo "no";
		} else {
			echo "right";
			// This is for the Java version that is really slow
			//shell_exec("sudo java -classpath .:classes:/opt/pi4j/lib/'*' rDoor");
			// execute script to open right door
			exec("./rDoor.sh");
		}
	}
?>