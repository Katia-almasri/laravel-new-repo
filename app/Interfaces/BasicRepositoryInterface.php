<?php

namespace App\Interfaces;

interface BasicRepositoryInterface
{
    public function getById($id);

    public function getByName($name);

    public function getAll();

    public function create($data);

    public function update($id, $data);

    public function delete($id);

    ######################## CUSTOM METHODS #####################
    public function createIfNotFoundById($id, $data);

    public function createIfNotFoundByName($name, $data);


    public function updateOrCreateById($id, $data);

    public function updateOrCreateByName($name, $data);
}
