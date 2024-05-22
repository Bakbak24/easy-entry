<?php
include_once(__DIR__ . '/Db.php');

class Progress
{
    private $status;
    private $naam;

    public function getStatusFromName($naam)
    {
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT status FROM progress WHERE naam = :naam");
        $statement->bindValue(':naam', $naam);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Get the value of naam
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Set the value of naam
     *
     * @return  self
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;

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
