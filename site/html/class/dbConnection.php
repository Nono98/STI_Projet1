<?php

class dbConnection {

    public function addUsers(){
        // Set default timezone
        date_default_timezone_set('UTC');


        // Create (connect to) SQLite database in file
        $file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
        // Set errormode to exceptions
        $file_db->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);


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
                'role' => 0)
        );

        foreach ($users as $u) {
            $file_db->exec("INSERT INTO User (username, password, validity, role)
                    VALUES ('{$u['username']}', '{$u['password']}', '{$u['validity']}', '{$u['role']}')");
        }

        // Close file db connection
        $file_db = null;
    }
    
    public function getUsers(){
        // Set default timezone
        date_default_timezone_set('UTC');


        // Create (connect to) SQLite database in file
        $file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
        // Set errormode to exceptions
        $file_db->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        
        $result =  $file_db->query('SELECT * FROM User');

        // Close file db connection
        $file_db = null;
        
        return $result;
    }
}