<?php

 namespace Source\Models;

 use Source\Core\Connect;

class User {
    private $name;
    private $email;
    private $username;
    private $password;
    private $message;

    public function __construct ($name = null,
                                 $email = null, $username = null, $password = null, $message = null){
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->message = $message;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username): void
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function findById (int $id) : User
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id",$id);
        try {
            $stmt->execute();
            if($stmt->rowCount()){
                $user = $stmt->fetch();
                $this->id = $user->id;
                $this->name = $user->name;
                $this->email = $user->email;
                $this->password = $user->password;
                return $this;
            }
            $this->message = "Usuário não encontrado!";
            return $this;
        } catch (PDOException $e) {
            $this->message = "Erro: {$e->getMessage()}";
            return $this;
        }
    }

    public function findByEmail (string $email) : bool
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email",$email);
        try {
            $stmt->execute();
            if($stmt->rowCount()){
                $user = $stmt->fetch();
                $this->id = $user->id;
                $this->name = $user->name;
                $this->email = $user->email;
                return true;
            }
            $this->message = "Usuário não encontrado!";
            return false;
        } catch (PDOException $e) {
            $this->message = "Erro: {$e->getMessage()}";
            return false;
        }
    }

    public function insert () : bool
    {
        if($this->findByEmail($this->email)){
            $this->message = "E-mail já cadastrado!";
            return false;
        }

        $query = "INSERT INTO users VALUES (NULL,:name,:email,:password)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bindParam(":password",$this->password);
        try {
            $stmt->execute();
            if($stmt->rowCount()){
                $this->id = Connect::getInstance()->lastInsertId();
                $this->message = "Usuário cadastrado com sucesso!";
                return true;
            }
            $this->message = "Erro ao inserir usuário, verifique os dados!";
            return false;
        } catch (PDOException $e) {
            $this->message = "Erro: {$e->getMessage()}";
            return false;
        }
    }

    public function auth (string $email, string $password) : bool
    {
        $query = "SELECT * 
                  FROM users 
                  WHERE email LIKE :email";

        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if($stmt->rowCount() == 0) {
            $this->message = "Usuário não encontrado!";
            return false;
        }

        $user = $stmt->fetch();

        if(!password_verify($password, $user->password)) {
            $this->message = "Senha incorreta!";
            return false;
        }

        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->message = "Usuário autenticado com sucesso!";
        return true;

    }

    public function selectAll ()
    {
        $query = "SELECT * FROM users";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }
}
