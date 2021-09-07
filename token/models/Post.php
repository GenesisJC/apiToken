<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'tokenlist';

    // Post Properties
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $tokenlive;
    public $tokenvod;
    public $reg_date;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT * from tokenlist';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT * from tokenlist WHERE id = ? LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->id = $row['id'];
          $this->firstname = $row['firstname'];
          $this->lastname = $row['lastname'];
          $this->email = $row['email'];
          $this->tokenlive = $row['tokenlive'];
          $this->tokenvod = $row['tokenvod'];
          $this->reg_date = $row['reg_date'];
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . 
          ' SET id = :id,
          firstname = :firstname, 
          lastname = :lastname, 
          email = :email, 
          tokenlive = :tokenlive, 
          tokenvod = :tokenvod, 
          reg_date = :reg_date';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));
          $this->firstname = htmlspecialchars(strip_tags($this->firstname));
          $this->lastname = htmlspecialchars(strip_tags($this->lastname));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->tokenlive = htmlspecialchars(strip_tags($this->tokenlive));
          $this->tokenvod = htmlspecialchars(strip_tags($this->tokenvod));
          $this->reg_date = htmlspecialchars(strip_tags($this->reg_date));
          
          // Bind data
          $stmt->bindParam(':id', $this->id);
          $stmt->bindParam(':firstname', $this->firstname);
          $stmt->bindParam(':lastname', $this->lastname);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':tokenlive', $this->tokenlive);
          $stmt->bindParam(':tokenvod', $this->tokenvod);
          $stmt->bindParam(':reg_date', $this->reg_date);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      
      return false;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . 
          ' SET id = :id,
          firstname = :firstname, 
          lastname = :lastname, 
          email = :email, 
          tokenlive = :tokenlive, 
          tokenvod = :tokenvod, 
          reg_date = :reg_date
          WHERE id = :id';
          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));
          $this->firstname = htmlspecialchars(strip_tags($this->firstname));
          $this->lastname = htmlspecialchars(strip_tags($this->lastname));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->tokenlive = htmlspecialchars(strip_tags($this->tokenlive));
          $this->tokenvod = htmlspecialchars(strip_tags($this->tokenvod));
          $this->reg_date = htmlspecialchars(strip_tags($this->reg_date));

          // Bind data
          $stmt->bindParam(':id', $this->id);
          $stmt->bindParam(':firstname', $this->firstname);
          $stmt->bindParam(':lastname', $this->lastname);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':tokenlive', $this->tokenlive);
          $stmt->bindParam(':tokenvod', $this->tokenvod);
          $stmt->bindParam(':reg_date', $this->reg_date);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }