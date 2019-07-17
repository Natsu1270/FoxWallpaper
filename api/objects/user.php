<?php
    class User{
        private $conn;
        private $table_name = "user";

        private $user_Id;
        private $username;
        private $password;
        private $fullname;
        private $birthday;
        private $gender;
        private $about;
        private $role;
        private $email;
        private $avatar;
        private $status;
        private $active_code;
        private $upload_count;

        public function __construct($db){
            $this -> conn = $db;
        }

        function read(){
 
            // select all query
            $query = "SELECT * FROM " . $this->table_name;
            // prepare query statement
            $stmt = $this->conn->prepare($query);
            // execute query
            $stmt->execute();
            return $stmt;
        }

    }

    