<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\QuestionRepository;
use Symfony\Component\Validator\Constraints as Checkings;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
  
    private ?int $id = null;
    #[Checkings\NotBlank(message: "Veuillez renseigner un titre pour votre question !")]
    #[ORM\Column(length: 255)]
    #[Checkings\Length(min:15)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Checkings\NotBlank(message: "Veuillez détailler votre message !")]
    private ?string $content = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?int $rating = null;

    #[ORM\Column]
    private ?int $answers = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getAnswers(): ?int
    {
        return $this->answers;
    }

    public function setAnswers(int $answers): self
    {
        $this->answers = $answers;

        return $this;
    }
}
