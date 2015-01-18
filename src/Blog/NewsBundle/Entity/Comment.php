<?php

namespace Blog\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\EntityRepository;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="Blog\NewsBundle\Repository\CommentRepository")
 * @ORM\Table(name="comment")
 */
class Comment
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    private $commentMessage;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private  $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated", type="datetime")
     */
    private $updated;

    /**
     * @Gedmo\Slug(fields={"commentMessage", "id"}, updatable=false)
     * @ORM\Column(name="slug", type="string", unique=true, length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="Advertisement", inversedBy="comments")
     * @ORM\JoinColumn(name="advertisement_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $comment;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set category
     *
     * @param \Blog\NewsBundle\Entity\Advertisement $category
     * @return Comment
     */
    public function setCategory(\Blog\NewsBundle\Entity\Advertisement $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Blog\NewsBundle\Entity\Advertisement 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set Message
     *
     * @param string $commentMessage
     * @return Comment
     */
    public function setCommentMessage($commentMessage)
    {
        $this->commentMessage = $commentMessage;

        return $this;
    }

    /**
     * Get commentMessage
     *
     * @return string 
     */
    public function getCommentMessage()
    {
        return $this->commentMessage;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Comment
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
