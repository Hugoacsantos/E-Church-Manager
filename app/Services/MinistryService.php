<?php

namespace App\Services;

use App\DTO\MinisterioDTO;
use App\DTO\MinistryDTO;
use App\Models\Ministry;
use App\Models\MinistryUser;
use App\Models\User;
use Exception;

class MinistryService {










    public function findById(string $id): Ministry {
        return Ministry::find($id);
    }


}
