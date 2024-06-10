<?php

namespace App\Http\Controllers\Api\V1\CommunityProfile;

use App\Http\Controllers\Controller;
use App\Repositories\CommunityProfileRepository;
use Illuminate\Http\Request;

class CommunityProfileController extends Controller
{
    private $communityProfileRepository;

    public function __construct(CommunityProfileRepository $communityProfileRepository)
    {
        $this->communityProfileRepository = $communityProfileRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return $this->communityProfileRepository->getFirst();
    }
}
