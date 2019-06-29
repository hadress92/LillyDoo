<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Address", mappedBy="user")
     */
    private $addresses;

    public function __construct()
    {
        parent::__construct();
        $this->addresses = new ArrayCollection();
    }

    /**
     * Add addresses
     *
     * @param Address $addresses
     * @return User
     */
    public function addAddress(Address $addresses) {
        $addresses->setUser($this);
        $this->addresses[] = $addresses;

        return $this;
    }

    /**
     * Remove addresses
     *
     * @param Address $addresses
     */
    public function removeAddress(Address $addresses) {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return Collection
     */
    public function getAddresses() {
        return $this->addresses;
    }
}