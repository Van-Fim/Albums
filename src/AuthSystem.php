<?
class AuthSystem
{
    public $DbManager;
    private $mysqli;
    public function __construct($DbManager)
    {
        $this->DbManager = $DbManager;
        $this->mysqli = $this->DbManager->mysqli;
    }
    public function registerUser($login, $password)
    {
        $st = $this->mysqli->prepare("INSERT INTO users (login, password) VALUES (?, ?)");
        $st->bind_param("ss", $login, md5($password));
        $st->execute();
    }
    public function loginUser($login, $password)
    {
        $st = $this->mysqli->prepare("SELECT * FROM users WHERE login=?");
        $st->bind_param("s", $login);
        $st->execute();
        $result = $st->get_result();
        $result = $result->fetch_assoc();
        $ret = false;
        if(is_array($result) && $result['password'] === md5($password))
        {
            $_SESSION['logged_user_login']=$result['login'];
            $ret = true;
        }
        return $ret;
    }
    public function logoutUser()
    {
        if($_SESSION['logged_user_login']>0)
        {
            unset($_SESSION['logged_user_login']);
            $ret = true;
        }
        return $ret;
    }
    public function GetUser()
    {
        $login = $_SESSION['logged_user_login'];
        $st = $this->mysqli->prepare("SELECT * FROM users WHERE login=?");
        $st->bind_param("s", $login);
        $st->execute();
        $result = $st->get_result();
        $result = $result->fetch_assoc();
        return $result;
    }
    public function GetUserById($id)
    {
        $st = $this->mysqli->prepare("SELECT * FROM users WHERE id=?");
        $st->bind_param("i", $id);
        $st->execute();
        $result = $st->get_result();
        $result = $result->fetch_assoc();
        return $result;
    }
}