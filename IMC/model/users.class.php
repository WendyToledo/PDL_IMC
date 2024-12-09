<?php

use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @Entity
 * @Table(name="uapv2202361.users")
 */
class users {

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
    

    

    public function getId() {
    return $this->id;
}

public function setEmail($email) {
    $this->email = $email;
}

public function setPassword_hash($pass) {
    $this->password_hash = $pass;
}
public function getPassword_hash() {
    return $this->password_hash; // Référence correcte à la propriété
}

// Setter et Getter pour le dernier login
public function setLastLogin($lastLogin) {
    $this->last_login = $lastLogin;
}

public function getLastLogin() {
    return $this->last_login;
}

}

?>
