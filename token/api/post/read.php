<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  // Blog post query
  $result = $post->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $posts_arr = array();
    //$posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      
      $post_item = array(
        'id' => $id,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'tokenlive' => $tokenlive,
        'tokenvod' => $tokenvod,
        'reg_date' => $reg_date
      );
      
      // Push to "data"
      array_push($posts_arr, $post_item);
    }
    // Turn to JSON & output
    echo json_encode($posts_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Data')
    );
    
  }
