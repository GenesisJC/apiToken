<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));
  $tokenlive = exec("python ../../EdgeAuth-Token-Python/cms_edgeauth.py -k 45deb62c23a35c0d57124bcd1c511a2c -a \"/*\" -w 3600 -n hdnts");
  $post->id = $data->id;
  $post->firstname = $data->firstname;
  $post->lastname = $data->lastname;
  $post->email = $data->email;
  $post->tokenlive = $tokenlive;
  $post->tokenvod = $data->tokenvod;
  $post->reg_date = $data->reg_date;  
  //echo $post->tokenlive;

  // Create post
  if($post->create()) {
    echo json_encode(
      array('message' => 'Post Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Created')
    );
  }

