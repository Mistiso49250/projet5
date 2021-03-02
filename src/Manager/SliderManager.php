<?php
declare(strict_types=1);

namespace App\Manager;

use App\Repository\MarqueRepository;
use App\Repository\SliderRepository;


class SliderManager
{
    private $sliderRepository;
    private $marqueRepository;

    public function __construct(SliderRepository $sliderRepository, MarqueRepository $marqueRepository)
    {
        $this->sliderRepository = $sliderRepository;
        $this->marqueRepository = $marqueRepository;
    }

    public function generateHomePage(): array
    {
        return $this->sliderRepository->findAll();
    }

    public function generateSliderMarque(): array
    {
        return $this->marqueRepository->findAll();
    }
}
