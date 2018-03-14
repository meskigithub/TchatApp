<?php

namespace App\Controllers;

use App\Models;

/**
 * 
 */
class TchatController extends AuthentificationController {

    protected $_messaqe;
    protected $_user;
    public function __construct() {
        parent::__construct();
        $this->_messaqe = new Models\message();
        $this->_user    = new Models\user();
    }

    /**
     * redirection page 
     */
    public function tchat() {

        if(isset($_POST['pseudo']) &&  isset($_POST['password'])){
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            $_SESSION['pseudo'] = $pseudo;
            $this->_user->createUser($pseudo,$password);
        }
        if (isset($_POST['logout']) && 'Deconnexion' == $_POST['logout']) {
            $this->logout($_SESSION['pseudo']);
        }
        if (isset($_SERVER['HTTP_REFERER'])) {

            echo $this->render(array(
                'listConnected' => parent::getAllConnected()
                    ), '../app/views/tchat.php');
        } else {

            header('Location: authentification.php');
        }
    }

    /**
     * Save message 
     */
    public function message() {
        if (isset($_POST['username']) && isset($_POST['message']) && $_POST['username'] == $_SESSION['pseudo']) {
            $user = parent::getUser()->getUserByPseudo(trim($_SESSION['pseudo']));
            $tchat = $this->_messaqe;
            $tchat->addMessage(htmlentities(strip_tags($_POST['message'])), $user['id']);
        }
    }

    /**
     * Get all messages
     */
    public function display() {

        $tchat = $this->_messaqe;

        echo $this->render(array(
            'messageList' => $tchat->getAllMessage()
                ), '../app/views/display.php');
    }

    /**
     * Render a page function
     * @param array $data
     * @param  string $url directory of view
     * @return type
     */
    public function render($data, $url) {
        extract($data);

        ob_start();
        include($url);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

}
