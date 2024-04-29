<?php
include_once(__DIR__ . '/Db.php');

class User
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $status;

    public function save()
    {
        $conn = Db::getConnection();
        $sql = "INSERT INTO users (firstname, lastname, email, password, status) VALUES (:firstname, :lastname, :email, :password, :status)";
        $statement = $conn->prepare($sql);
        $statement->bindValue(':firstname', $this->firstname);
        $statement->bindValue(':lastname', $this->lastname);
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':password', $this->password);
        $statement->bindValue(':status', $this->status);
        $result = $statement->execute();
        return $result;
    }

    public function login()
    {
        $conn = Db::getConnection();
        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $conn->prepare($sql);
        $statement->bindValue(':email', $this->email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result && password_verify($this->password, $result['password'])) {
            return $result;
        } else {
            throw new Exception('Invalid email or password');
            return false;
        }
    }



    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
