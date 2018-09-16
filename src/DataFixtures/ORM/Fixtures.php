<?php

namespace App\DataFixtures\ORM;

use App\Entity\Author;
use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $author = new Author();
        $author
            ->setName('Joe Bloggs')
            ->setTitle('Author')
            ->setUsername('auth0-username')
            ->setEmail('joebloggs@author.com');

        $manager->persist($author);

        $blogPost = new BlogPost();
        $blogPost
            ->setSlug("a slug")
            ->setTitleEN("title EN")
            ->setTitleDE("title DE")
            ->setBodyEN("body EN")
            ->setBodyDE("body DE")
            ->setAuthor($author);

        $manager->persist($blogPost);

        $user = new Author();
        $user
            ->setName('Red Devil')
            ->setTitle('User')
            ->setUsername("RedDevil")
            ->setEmail('redevil@user.com');

        $manager->persist($user);

        $manager->flush();
    }
}