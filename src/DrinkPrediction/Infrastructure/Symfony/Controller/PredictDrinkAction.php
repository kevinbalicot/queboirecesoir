<?php

declare(strict_types=1);

namespace App\DrinkPrediction\Infrastructure\Symfony\Controller;

use App\DrinkPrediction\Application\Operation\Command\PredictDrinkCommand;
use App\DrinkPrediction\Domain\Enum\AgeRangeEnum;
use App\DrinkPrediction\Domain\Enum\CharacterEnum;
use App\DrinkPrediction\Domain\Enum\CorpulenceEnum;
use App\DrinkPrediction\Domain\Enum\HairinessColorEnum;
use App\DrinkPrediction\Domain\Enum\PoliticalOrientationEnum;
use App\DrinkPrediction\Domain\Enum\SizeEnum;
use App\DrinkPrediction\Domain\Enum\WayOfThinkingEnum;
use App\DrinkPrediction\Domain\Model\DrinkPredictionInterface;
use App\Shared\Application\Command\CommandBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PredictDrinkAction extends AbstractController
{
    public function __construct(
        private readonly CommandBusInterface $commandBus
    ) {
    }

    #[Route(path: '/api/predict-drink', name: 'app_predict_drink')]
    public function __invoke(Request $request): Response
    {
        try {
            $data = json_decode($request->getContent()) ?? [];
        } catch (\Exception $exception) {
            return $this->json(['message' => $exception->getMessage()], 400);
        }

        $command = new PredictDrinkCommand(
            age: AgeRangeEnum::getAgeRange($data['birthday'] ?? new \DateTime()),
            size: SizeEnum::getSize((int) ($data['size'] ?? 170)),
            hairinessColor: HairinessColorEnum::getHairinessColor($data['hairinessColor'] ?? 'unknown'),
            corpulence: CorpulenceEnum::getCorpulence($data['corpulence'] ?? 'unknown'),
            characters: array_map(fn (string $character) => CharacterEnum::getCharacter($character), $data['character'] ?? []),
            politicalOrientations: array_map(fn (string $orientation) => PoliticalOrientationEnum::getPoliticalOrientation($orientation), $data['politicalOrientation'] ?? []),
            wayOfThinkings: array_map(fn (string $way) => WayOfThinkingEnum::getWayOfThinking($way), $data['wayOfThinking'] ?? []),
        );

        /** @var DrinkPredictionInterface $prediction */
        $prediction = $this->commandBus->dispatch($command);

        return $this->json($prediction->getPrediction());
    }
}
