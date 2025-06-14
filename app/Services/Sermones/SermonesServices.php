<?php

namespace App\Services\Sermones;

use App\DTOs\Sermones\DTOsSermones;
use App\Interfaces\Sermones\ISermonesServices;
use App\Repository\Sermones\SermonesRepository;
use Exception;

class SermonesServices implements ISermonesServices
{
    protected SermonesRepository $SermonesRepository;

    public function __construct(SermonesRepository $SermonesRepository)
    {
        $this->SermonesRepository = $SermonesRepository;
    }

    public function getAllSermoness()
    {
        try {
            $results = $this->SermonesRepository->getAllSermoness();
            
            // Agregar información de YouTube a cada sermón
            $formattedResults = $results->map(function ($sermon) {
                return $this->formatSermonWithYouTubeData($sermon);
            });
            
            return [
                'success' => true,
                'data' => $formattedResults
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function getSermonesById($id)
    {
        try {
            $result = $this->SermonesRepository->getSermonesById($id);
            
            // Agregar información de YouTube
            $formattedResult = $this->formatSermonWithYouTubeData($result);
            
            return [
                'success' => true,
                'data' => $formattedResult
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function createSermones(DTOsSermones $data)
    {
        try {
            $result = $this->SermonesRepository->createSermones($data);
            
            // Agregar información de YouTube al resultado
            $formattedResult = $this->formatSermonWithYouTubeData($result);
            
            return [
                'success' => true,
                'data' => $formattedResult
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function updateSermones(DTOsSermones $data, $id)
    {
        try {
            $Sermones = $this->SermonesRepository->getSermonesById($id);
            $result = $this->SermonesRepository->updateSermones($data, $Sermones);
            
            // Agregar información de YouTube
            $formattedResult = $this->formatSermonWithYouTubeData($result);
            
            return [
                'success' => true,
                'data' => $formattedResult
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function deleteSermones($id)
    {
        try {
            $Sermones = $this->SermonesRepository->getSermonesById($id);
            $results = $this->SermonesRepository->deleteSermones($Sermones);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    /**
     * Formato del sermón con información adicional de YouTube
     */
    private function formatSermonWithYouTubeData($sermon)
    {
        $sermonArray = $sermon->toArray();
        
        // Agregar información de YouTube
        $sermonArray['youtube_video_id'] = $sermon->getYoutubeVideoId();
        $sermonArray['youtube_embed_url'] = $sermon->getYoutubeEmbedUrl();
        $sermonArray['youtube_thumbnail'] = $sermon->getYoutubeThumbnail();
        
        return $sermonArray;
    }
}