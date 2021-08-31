<?php

namespace DigitalCloud\ModelNotes;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasNotes
{
    public function notes(): MorphMany
    {
        return $this->morphMany($this->getNoteModelClassName(), 'model', 'model_type', $this->getModelKeyColumnName())->latest('id');
    }

    public function setNote(string $note): self
    {
        $this->notes()->create(['note' => $note]);
        return $this;
    }

    protected function getModelKeyColumnName(): string
    {
        return config('model-notes.model_primary_key_attribute') ?? 'model_id';
    }

    protected function getNoteModelClassName(): string
    {
        return config('model-notes.note_model');
    }

    protected function getNoteModelType(): string
    {
        return array_search(static::class, Relation::morphMap()) ?: static::class;
    }
}
