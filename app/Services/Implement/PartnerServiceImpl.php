<?php

namespace App\Services\Implement;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Services\PartnerService;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PartnerRepository;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Partner\StorePartnerRequest;

class PartnerServiceImpl implements PartnerService
{
    private $partnerRepository;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function create(array $data)
    {
        return $this->partnerRepository->create([
            'name' => $data['name'],
            'website' => $data['website'],
            'image' => $data['image']->storeAs('uploads/images/partners', uniqid() . '.' . $data['image']->getClientOriginalExtension(), 'public'),
        ]);
    }

    public function update($id, array $data)
    {
        $partner = $this->partnerRepository->getById($id);

        if (empty($data['image'])) {
            return $this->partnerRepository->update($id, [
                'name' => $data['name'],
                'website' => $data['website'],
                'image' => $partner->image,
            ]);
        }

        $filename = public_path('storage/' . $partner->image);

        if ($partner->image && file_exists($filename)) {
            unlink($filename);
        }

        return $this->partnerRepository->update($id, [
            'name' => $data['name'],
            'website' => $data['website'],
            'image' => $data['image']->storeAs('uploads/images/partners', uniqid() . '.' . $data['image']->getClientOriginalExtension(), 'public'),
        ]);
    }
}
