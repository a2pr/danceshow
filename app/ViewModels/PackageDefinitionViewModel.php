<?php

namespace App\ViewModels;

use App\Models\PackageDefinition;

class PackageDefinitionViewModel
{
    public string $type;
    public string $name;
    public string $description;
    public ?string $duration;
    public ?string $quantity;

    public function __construct(string $type, string $name, string $description, ?string $duration, ?string $quantity)
    {
        $this->type = $type;
        $this->name = $name;
        $this->description = $description;
        $this->duration = $duration;
        $this->quantity = $quantity;
    }

    public function getType(): string
    {
        return $this->type == 'interval' ? 'Intervalo' : 'Quantidade';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDuration(): ?string
    {
        $message = null;
        switch ($this->duration) {
            case PackageDefinition::ONE_WEEK_INTERVAL:
                $message = 'Uma semana';
                break;
            case PackageDefinition::ONE_MONTH_INTERVAL:
                $message = 'Um Mes';
                break;
            case PackageDefinition::TWO_WEEK_INTERVAL:
                $message = 'Dois semana';
                break;
        }

        return $message;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

}
