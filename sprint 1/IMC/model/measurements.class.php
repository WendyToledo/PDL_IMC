<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="uapv2500724.measurements")
 */
class Measurement {

    /** @Id @Column(type="integer")
     *  @GeneratedValue
     */
    public $id;

    /**
     * @ManyToOne(targetEntity="users", inversedBy="measurements")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    public $user;

    /** @Column(type="decimal", precision=5, scale=2) */
    public $weight;

    /** @Column(type="decimal", precision=4, scale=2) */
    public $height;

    /** @Column(type="decimal", precision=4, scale=2) */
    public $calculated_imc;

    /** @Column(type="datetime") */
    public $taken_at;

    /*public function __construct() {
        $this->taken_at = new \DateTime(); // Par défaut, la date est la date actuelle
    }*/
}

?>