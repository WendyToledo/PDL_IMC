<?php

use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @Entity
 * @Table(name="uapv2500724.users")
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
}

?>
