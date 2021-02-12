<?php
declare(strict_types=1);

namespace App\Manager;

use App\Repository\SliderRepository;


class SliderManager
{
    private $sliderRepository;

    public function __construct(SliderRepository $sliderRepository)
    {
        
        $this->sliderRepository = $sliderRepository;
    }

    public function generateHomePage(): array
    {
        return $this->sliderRepository->findAll();
    }
}
