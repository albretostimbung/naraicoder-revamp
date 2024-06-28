<?php

namespace App\Services\Implement;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Services\TeamService;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TeamRepository;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Team\StoreTeamRequest;

class TeamServiceImpl implements TeamService
{
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function create(array $data)
    {
        return $this->teamRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'image' => $data['image']->storeAs('uploads/images/teams', uniqid() . '.' . $data['image']->getClientOriginalExtension(), 'public'),
        ]);
    }

    public function update($id, array $data)
    {
        $team = $this->teamRepository->getById($id);

        if (empty($data['image'])) {
            return $this->teamRepository->update($id, [
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => $data['role'],
                'image' => $team->image,
            ]);
        }

        $filename = public_path('storage/' . $team->image);

        if ($team->image && file_exists($filename)) {
            unlink($filename);
        }

        return $this->teamRepository->update($id, [
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'image' => $data['image']->storeAs('uploads/images/teams', uniqid() . '.' . $data['image']->getClientOriginalExtension(), 'public'),
        ]);
    }
}
