<?php

use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @Entity
 * @Table(name="uapv2202144.users")
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

    

    public function setEmail($email) {
        $this->email = $email;
    }
 
    public function setPassword_hash($pass) {
        $this->password_hash = $pass;
    }
}

?>
