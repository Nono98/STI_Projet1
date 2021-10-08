<?php

class dbConnection {

    private $file_db;

    private function openConnection(){
        // Set default timezone
        date_default_timezone_set('UTC');


        // Create (connect to) SQLite database in file
        $this->file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
        // Set errormode to exceptions
        $this->file_db->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
    }

    private function closeConnection(){
        // Close file db connection
        $this->file_db = null;
    }

    public function addUsers(){
        // Array with some test data to insert to database
        $users = array(
            array('username' => 'user1',
                'password' => 'User1',
                'validity' => 1,
                'role' => 0),
            array('username' => 'user2',
                'password' => 'User2',
                'validity' => 1,
                'role' => 0),
            array('username' => 'admin1',
                'password' => 'Admin1',
                'validity' => 1,
                'role' => 1)
        );
        
        $this->openConnection();

        $this->file_db->exec("DROP TABLE User");

        $this->file_db->exec("CREATE TABLE IF NOT EXISTS User (
                    username TEXT PRIMARY KEY NOT NULL, 
                    password TEXT NOT NULL, 
                    validty INTEGER NOT NULL, 
                    role INTEGER NOT NULL)");

        foreach ($users as $u) {
            $this->file_db->exec("INSERT INTO User (username, password, validty, role)
                    VALUES ('{$u['username']}', '{$u['password']}', '{$u['validity']}', '{$u['role']}')");
        }
        
        $this->closeConnection();
    }
    
    public function getUsers(){
        $this->openConnection();
        
        $result = $this->file_db->query('SELECT * FROM User');

        $this->closeConnection();
        
        return $result;
    }

    public function getUser($username){
        $this->openConnection();

        $result = $this->file_db->query("SELECT * FROM User WHERE username = '$username'");

        $this->closeConnection();

        return $result;
    }

    public function getUsernames($username){
        $this->openConnection();

        $result = $this->file_db->query("SELECT username FROM User WHERE username != '$username'");

        $this->closeConnection();

        return $result;
    }

    public function addUser($username, $password, $validity, $role){
        $this->openConnection();

        $this->file_db->exec("INSERT INTO User (username, password, validty, role) VALUES ('$username', '$password', '$validity', '$role')");

        $this->closeConnection();
    }

    public function deleteUser($username){
        $this->openConnection();

        $this->file_db->exec("DELETE FROM User WHERE username = '$username'");

        $this->closeConnection();
    }

    public function editUser($username, $password, $validity, $role){
        $this->openConnection();

        $this->file_db->exec("UPDATE User SET password = '$password', validty = '$validity', role = '$role' WHERE username = '$username'");

        $this->closeConnection();
    }
    
    public function editPassword($username, $password){
        $this->openConnection();

        $this->file_db->exec("UPDATE User SET password = '$password' WHERE username = '$username'");

        $this->closeConnection();
    }

    public function newMessage($username, $date, $to, $subject, $message){
        $this->openConnection();

        $this->file_db->exec("INSERT INTO Message ('date', 'from', 'to', 'subject', 'message') VALUES ('$date', '$username', '$to', '$subject', '$message')");

        $this->closeConnection();
    }

    public function getMessages(){
        $this->openConnection();

        $result = $this->file_db->query("SELECT * FROM Message ORDER BY date DESC");

        $this->closeConnection();

        return $result;
    }

    public function getMessage($id){
        $this->openConnection();

        $result = $this->file_db->query("SELECT * FROM Message WHERE id = '$id'");

        $this->closeConnection();

        return $result;
    }

    public function deleteMessage($id) {
        $this->openConnection();

        $this->file_db->exec("DELETE FROM Message WHERE id = '$id'");

        $this->closeConnection();
    }
}