<?php

namespace DigitalCloud\ModelNotes;

use DigitalCloud\Blameable\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Note extends Model {

    use Blameable;

    protected $guarded = [];

    protected $table = 'notes';

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function __toString(): string
    {
        return $this->note;
    }
}
