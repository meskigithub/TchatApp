<?php

namespace App\Models;

use App\Database; 

/**
 * 
 */
class message {
    private $_db = null;
    
    public function __construct() {
         $this->_db = Database::getInstance();
    }
    
    /**
     * Add Message
     * @param string $message enter Message
     * @param int $userId User Identification
     */
    public function addMessage($message, $userId) {
        
        $query = $this->_db->prepare('INSERT INTO message (user_id,message,date) VALUES (:userId, :message, now())');
        $query->execute(array(
            ':userId' => $userId,
            ':message' => $message,
        ));
    }
    
    /**
     * Get All Messages
     * @return array
     */
    public function getAllMessage() {
        $query = $this->_db->prepare('SELECT DATE_FORMAT(m.date,"%d-%m-%Y %H:%i:%s") as dateMessage, m.message, u.pseudo FROM message m INNER JOIN user u ON u.id = m.user_id ORDER BY date DESC');
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
