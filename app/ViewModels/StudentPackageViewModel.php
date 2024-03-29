<?php

namespace App\ViewModels;

use App\Models\Package;
use DateTime;

class StudentPackageViewModel
{
    public string $student_name;
    public string $package_type;
    public ?string $package_start_date;
    public ?string $package_end_date;
    public ?int $package_current_amount;
    public bool $active;
    public ?string $notes = null;
    public string $created;

    public function __construct(string $student_name, string $package_type, ?string $package_start_date, ?string $package_end_date, ?int $package_current_amount, bool $active,  string $created, ?string $notes = null)
    {
        $this->student_name = $student_name;
        $this->package_type = $package_type;
        $this->package_start_date = $package_start_date;
        $this->package_end_date = $package_end_date;
        $this->package_current_amount = $package_current_amount;
        $this->active = $active;
        $this->notes = $notes;
        $this->created = $created;
    }

    public function getPackageStartDate(): ?string
    {
        return $this->package_start_date;
    }

    public function getPackageEndDate(): ?string
    {
        return $this->package_end_date;
    }

    public function getStudentName(): string
    {
        return $this->student_name;
    }

    public function getPackageType(): string
    {
        return $this->package_type;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getPackageCurrentAmount(): ?int
    {
        return $this->package_current_amount;
    }

    public function isAmountType():bool
    {
        return $this->getPackageType() == Package::AMOUNT_TYPE;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function getCreated(): string
    {
        return $this->created;
    }
}
