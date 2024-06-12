<?php
namespace App\Services\Implement;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\EventService;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\EventRepository;
use App\Repositories\EventImagesRepository;

class EventServiceImpl implements EventService
{
    private $eventRepository;
    private $eventImagesRepository;

    public function __construct(EventRepository $eventRepository, EventImagesRepository $eventImagesRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->eventImagesRepository = $eventImagesRepository;
    }

    public function register(array $data)
    {
        $result = DB::transaction(function () use ($data) {
            $event = $this->eventRepository->create($data);

            $imagesData = [];
            foreach ($data['images'] as $item) {
                $imagesData[] = [
                    'event_id' => $event->id,
                    'image' => $item['image']
                ];
            }

            $this->eventImagesRepository->insert($imagesData);

            $eventArray = $event->toArray();

            return array_merge($eventArray, ['images' => $imagesData]);
        });

        return $result;
    }
}
