<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
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
    * @ORM\OneToMany(targetEntity="Contact", mappedBy="users")
    * @ORM\JoinColumn(name="id", referencedColumnName="user_id")
    */
    protected $contacts;

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Add contacts
     *
     * @param \AppBundle\Entity\Contact $contacts
     * @return User
     */
    public function addContact(\AppBundle\Entity\Contact $contacts)
    {
        $this->contacts[] = $contacts;

        return $this;
    }

    /**
     * Remove contacts
     *
     * @param \AppBundle\Entity\Contact $contacts
     */
    public function removeContact(\AppBundle\Entity\Contact $contacts)
    {
        $this->contacts->removeElement($contacts);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContacts()
    {
        return $this->contacts;
    }
}
