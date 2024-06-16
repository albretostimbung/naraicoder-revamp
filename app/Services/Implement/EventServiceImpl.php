<?php

namespace App\Services\Implement;

use App\Repositories\EventImageRepository;
use App\Repositories\EventRepository;
use App\Services\EventService;
use Exception;
use Illuminate\Support\Facades\DB;

class EventServiceImpl implements EventService
{
    private $eventRepository;

    private $eventImagesRepository;

    public function __construct(EventRepository $eventRepository, EventImageRepository $eventImagesRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->eventImagesRepository = $eventImagesRepository;
    }

    public function register(array $data)
    {
        return DB::transaction(function () use ($data) {
            try {
                $event = $this->eventRepository->create($data);

                $imagesData = [];
                foreach ($data['images'] as $item) {
                    $imagesData[] = [
                        'event_id' => $event->id,
                        'image' => $item['image'],
                    ];
                }

                $this->eventImagesRepository->insert($imagesData);

                return $event;
            } catch (Exception $e) {
                return $e->getMessage();
            }
        });
    }

    public function delete($id)
    {
        return DB::transaction(function () use ($id) {
            try {
                $event = $this->eventRepository->getById($id);

                $event->eventImages()->delete();
                $event->delete();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        });
    }
}
