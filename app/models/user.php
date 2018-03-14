<?php
    /**
     * Author : Meski Mohamed
     * Email  : mohamed.meski@gmail.com
     */
namespace App\Models;

use App\Database; 

/**
 * 
 */
class user {

    private $_db = null;
    
    public function __construct() {
         $this->_db = Database::getInstance();
    }
        
    /**
     * Create a new user 
     * @param string $pseudo
     * @param string $password hach password
     */
    public  function createUser($pseudo, $password) {

        $query = $this->_db->prepare('INSERT INTO user (pseudo,password,connected) VALUES (:pseudo, :password, :connected)');
        $query->execute(array(
            ':pseudo' => $pseudo,
            ':password' => $password,
            ':connected' => 1
        ));
    }

    /**
     * Mets à jour l'etat du user
     * @param string $pseudo
     * @param int $connected 
     */
    public function updateUser($pseudo, $connected) {
        $query = $this->_db->prepare("UPDATE user SET connected = :connected WHERE pseudo = :pseudo");
        $query->execute(array(
            ':pseudo' => $pseudo,
            ':connected' =>$connected
        ));
    }

    /**
     * Get User By Pseudo and Password 
     * @param type $speudo
     * @return type
     */
    public function getUser($pseudo, $password) {
              
       
        try {
            $query = $this->_db->prepare('SELECT * FROM user WHERE pseudo = :pseudo AND password = :password');
            $query->execute(array(':pseudo' => $pseudo,':password' => $password));
            return $query->fetch();
        } catch (PDOException $e) {
            
        }
    }
    
    /**
     * Get user by Pseudo
     * @param type $pseudo
     * @return type
     */
    public function getUserByPseudo($pseudo) {
              
       
        try {
            $query = $this->_db->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
            $query->execute(array(':pseudo' => $pseudo));
            return $query->fetch();
        } catch (PDOException $e) {
            
        }
    }

    /**
     * Get All users
     * @return type
     */
    public function getAllUsersConnected() {
        try {
            $query = $this->_db->prepare('SELECT pseudo FROM user WHERE connected  = :connected');
            $query->execute(array(':connected' => 1));
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
        }
    }

}
