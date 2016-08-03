<?php

namespace App\Utilities;

use App\Models\Protocols;

class SharedWithView {

    public function protocols() {
        $protocols = Protocols::all();

        return $protocols;
    }
}