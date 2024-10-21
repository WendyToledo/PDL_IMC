<?php

use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @Entity
 * @Table(name="uapv2202361.bmr")
 */
class BMR {

    /** @Id @Column(type="integer")
     *  @GeneratedValue
     */ 
    public $id;

    /** 
     * @ManyToOne(targetEntity="users", inversedBy="bmr)
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    public $user;

    /** @Column(type="decimal", precision=5, scale=2) */ 
    public $weight;

    /** @Column(type="decimal", precision=4, scale=2) */ 
    public $height;
    
    /** @Column(type="integer") */ 
    public $age;
    
    /** @Column(type="string", length=10) */ 
    public $gender;

    /** @Column(type="decimal", precision=4, scale=2) */ 
    public $calculated_bmr;

    /** @Column(type="datetime") */ 
    public $taken_at;

    /*public function __construct() {
        $this->taken_at = new \DateTime(); // Par défaut, la date est la date actuelle
    }*/
}

?>
