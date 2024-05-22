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

    public function statusUpdate($status)
    {
        $conn = Db::getConnection();
        $sql = "UPDATE users SET status = :status WHERE email = :email";
        $statement = $conn->prepare($sql);
        $statement->bindValue(':status', $status);
        $statement->bindValue(':email', $this->email);
        $result = $statement->execute();
        return $result;
    }

    public function nextStep($currentStatus)
    {
        $conn = Db::getConnection();
        $nextStatus = '';

        // Determine the next step based on the current status
        switch ($currentStatus) {
            case '1':
                $nextStatus = '2';
                break;
            case '2':
                $nextStatus = '3';
                break;
            case '3':
                $nextStatus = '4';
                break;
            default:
                throw new Exception("Invalid status");
        }

        // Update status using the REPLACE function
        $sql = "UPDATE users SET status = REPLACE(status, :currentStatus, :nextStatus) WHERE email = :email";
        $statement = $conn->prepare($sql);
        $statement->bindValue(':currentStatus', $currentStatus);
        $statement->bindValue(':nextStatus', $nextStatus);
        $statement->bindValue(':email', $this->email);

        if ($statement->execute()) {
            return true;
        } else {
            $errorInfo = $statement->errorInfo();
            throw new Exception("Database error: " . $errorInfo[2]);
        }
    }


    public static function getAllData()
    {
        $conn = Db::getConnection();
        $sql = "SELECT * FROM users";
        $statement = $conn->query($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
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
