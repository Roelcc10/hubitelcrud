<?php
$conn = mysqli_connect('localhost', 'root', '', 'hubitelcrud');
if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
}
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $sql = "INSERT INTO info (name, lastname, gender) VALUES ('$name', '$lastname', '$gender')";
    if (mysqli_query($conn, $sql)) {
        $id = mysqli_insert_id($conn);
        $saved_agents = '<div class="comment_box">
      		<span class="delete" data-id="' . $id . '" >delete</span>
      		<span class="edit" data-id="' . $id . '">edit</span>
      		<div class="display_name">'. $name .'</div>
      		<div class="display_name">'. $lastname .'</div>
      		<div class="display_name">'. $gender .'</div>
      	</div>';
        echo $saved_agents;
    }else {
        echo "Error: ". mysqli_error($conn);
    }
    exit();
}
// delete comment fromd database
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM agents WHERE id=" . $id;
    mysqli_query($conn, $sql);
    exit();
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $sql = "UPDATE agents SET name='{$name}', lastname='{$lastname}', gender='{$gender}'  WHERE id=".$id;
    if (mysqli_query($conn, $sql)) {
        $id = mysqli_insert_id($conn);
        $saved_agents = '<div class="comment_box">
  		  <span class="delete" data-id="' . $id . '" >delete</span>
  		  <span class="edit" data-id="' . $id . '">edit</span>
  		 <div class="display_name">'. $name .'</div>
      		<div class="display_name">'. $lastname .'</div>
      		<div class="display_name">'. $gender .'</div>
  	  </div>';
        echo $saved_agents;
    }else {
        echo "Error: ". mysqli_error($conn);
    }
    exit();
}

// Retrieve agents from database
$sql = "SELECT * FROM agents";
$result = mysqli_query($conn, $sql);
$agents = '<div id="display_area">';
while ($row = mysqli_fetch_array($result)) {
    $agents .= '<div class="comment_box">
  		  <span class="delete" data-id="' . $row['id'] . '" >delete</span>
  		  <span class="edit" data-id="' . $row['id'] . '">edit</span>
      	  <div class="display_name">'. $row['name'] .'</div>
  		  <div class="display_name">'. $row['lastname'] .'</div>
  		  <div class="display_name">'. $row['gender'] .'</div>
  	  </div>';
}
$agents .= '</div>';
?>