<?php

use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @Entity
 * @Table(name="uapv2100281.users")
 */
class User {

    /** @Id @Column(type="integer")
     *  @GeneratedValue
     */ 
    public $id;

    /** @Column(type="string", length=255) */ 
    public $email;

    /** @Column(type="string", length=255) */ 
    public $password_hash;

    /** @Column(type="datetime") */ 
    public $created_at;

    /** @Column(type="datetime", nullable=true) */ 
    public $last_login;

    /**
     * @OneToMany(targetEntity="Measurement", mappedBy="user")
     */
    private $measurements;

    /*public function __construct() {
        $this->measurements = new ArrayCollection();
        $this->created_at = new \DateTime(); // Par défaut, la date de création est la date actuelle
    }

    public function getMeasurements() {
        return $this->measurements;
    }*/

    // Getters and Setters
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPasswordHash() {
        return $this->password_hash;
    }

    public function setPasswordHash($password_hash) {
        $this->password_hash = password_hash($password_hash, PASSWORD_BCRYPT);
    }

    public function getLastLogin() {
        return $this->last_login;
    }

    public function setLastLogin($last_login) {
        $this->last_login = $last_login;
    }
}

?>
