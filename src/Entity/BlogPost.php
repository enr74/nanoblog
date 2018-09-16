<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogPost
 *
 * @ORM\Table(name="blog_post")
 * @ORM\Entity(repositoryClass="App\Repository\BlogPostRepository")
 * @ORM\HasLifecycleCallbacks
 */
class BlogPost
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titleEN", type="string", length=255)
     */
    private $titleEN;

    /**
     * @var string
     *
     * @ORM\Column(name="titleDE", type="string", length=255)
     */
    private $titleDE;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="bodyDE", type="text")
     */
    private $bodyDE;

    /**
     * @var string
     *
     * @ORM\Column(name="bodyEN", type="text")
     */
    private $bodyEN;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitleEN()
    {
        return $this->titleEN;
    }

    /**
     * @param string $titleEN
     */
    public function setTitleEN(string $titleEN)
    {
        $this->titleEN = $titleEN;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitleDE()
    {
        return $this->titleDE;
    }

    /**
     * @param string $titleDE
     */
    public function setTitleDE(string $titleDE)
    {
        $this->titleDE = $titleDE;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getBodyDE()
    {
        return $this->bodyDE;
    }

    /**
     * @param string $bodyDE
     */
    public function setBodyDE(string $bodyDE)
    {
        $this->bodyDE = $bodyDE;
        return $this;
    }

    /**
     * @return string
     */
    public function getBodyEN()
    {
        return $this->bodyEN;
    }

    /**
     * @param string $bodyEN
     */
    public function setBodyEN(string $bodyEN)
    {
        $this->bodyEN = $bodyEN;
        return $this;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor(Author $author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @var Author
     *
     * @ORM\ManyToOne(targetEntity="Author")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

}