<?php
namespace App\Services;

interface MemberService
{
    public function getAll();
    public function getById($id);
    public function update($id, array $data);
    public function delete($id);
}
