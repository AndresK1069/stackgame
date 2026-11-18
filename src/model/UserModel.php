<?php
class UserModel {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function get_user_from_login_password(string $login, string $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $req = $this->pdo->prepare('select id, login, password from users where login = :login and password = :password');
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
        $req->execute();

        $user = $req->fetch(PDO::FETCH_ASSOC);
        return ($user && password_verify($password, $user['password'])) ? $user : null;
    }

    public function add_user(string $login, string $password, string $name, string $firstname) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $req = $this->pdo->prepare('insert into users (login, password, name, firstname, type_user) values (:login, :password, :name, :firstname, :user);');
            $req->bindValue(':login', $login, PDO::PARAM_STR);
            $req->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->bindValue(':firstname', $firstname, PDO::PARAM_STR);
            $req->bindValue(':user', 'user', PDO::PARAM_STR);
            $req->execute();
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }
    public function login_exists(string $login): bool
    {
        $req = $this->pdo->prepare('select 1 from users where login = :login limit 1');
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchColumn() !== false;
    }


}
?>