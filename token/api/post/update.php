<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
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

  // Set ID to update
  $post->id = $data->id;

  $post->firstname = $data->firstname;
  $post->lastname = $data->lastname;
  $post->email = $data->email;
  $post->tokenlive = $tokenlive;
  $post->tokenvod = $data->tokenvod;
  $post->reg_date = $data->reg_date;  

  // Update post
  if($post->update()) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }

