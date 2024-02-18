<?php

namespace App\DataTransferObjects;

class PackageDefinitionCreateDto
{
    private int $packageDefinitionId;
    private string $type;
    private string $name;
    private ?int $amount;
    private ?string $duration;

    public function __construct(int $packageDefinitionId, string $type, string $name, ?int $amount, ?string $duration)
    {
        $this->packageDefinitionId = $packageDefinitionId;
        $this->type = $type;
        $this->name = $name;
        $this->amount = $amount;
        $this->duration = $duration;
    }

    public function getPackageDefinitionId(): int
    {
        return $this->packageDefinitionId;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function allInfo()
    {
        return sprintf('Type: %s | Package Name: %s | Initial Amount: %s | Initial Duration: %s |',
            $this->getType(),
            $this->getName(),
            $this->getAmount(),
            $this->getDuration(),
        );
    }
}
