<?php

namespace App\DataTransferObjects;

class PackageCreateDto
{
    private StudentDto $studentDto;
    private array $packageDefinitions;

    public function __construct(StudentDto $studentDto, array $packageDefinitions)
    {
        $this->studentDto = $studentDto;
        $this->packageDefinitions = $packageDefinitions;
    }

    public function getStudentDto(): StudentDto
    {
        return $this->studentDto;
    }

    public function getPackageDefinitions(): array
    {
        return $this->packageDefinitions;
    }
}
