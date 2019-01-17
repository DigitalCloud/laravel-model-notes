<?php

namespace DigitalCloud\ModelNotes\Events;

use DigitalCloud\ModelNotes\Note;

class NoteAdded {

    public $note;

    public function __construct(Note $note) {
        $this->note = $note;
    }
}
