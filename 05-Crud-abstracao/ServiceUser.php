<?php
class ServiceUser
{
    private $db;
    private $user;

    function __construct(Mysqli $mysqli, User $user)
    {
        $this->db = $mysqli;
        $this->user = $user;
    }

    public function find($id)
    {
        $stmt = $this->db->stmt_init();
        $stmt->prepare("SELECT * FROM {$this->user->getTable()} WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($id, $name, $email);
        $stmt->fetch();
        return array("id" => $id, "name" => $name, "email" => $email);
    }

    //Crud Init
    public function list($order = null)
    {
        if ($order) $sql = "SELECT * FROM {$this->user->getTable()} ORDER BY {$order}";
        else $sql = "SELECT * FROM {$this->user->getTable()}";
        $query = $this->db->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function insert()
    {
        $stmt = $this->db->stmt_init();
        $stmt->prepare("INSERT INTO {$this->user->getTable()}(name, email) VALUES(?,?)");
        $stmt->bind_param('ss', $name, $this->user->getEmail());
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function update()
    {
        $stmt = $this->db->stmt_init();
        $stmt->prepare("UPDATE {$this->user->getTable()} SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param('ssi', $this->user->getName(), $this->user->getEmail(), $this->user->getId());
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->stmt_init();
        $stmt->prepare("DELETE FROM {$this->user->getTable()} WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
    // Crud End
}
