<?php namespace Teepluss\Wordbreaker\Wrapper;

use PhlongTaIam\Dict as BaseDict;

class Dict extends BaseDict {

    /**
     * Add wording to dict.
     *
     * @param array $word
     */
    public function add($word)
    {
        $this->dict = array_merge($this->dict, $word);

        return $this;
    }

    /**
     * Sorting array.
     *
     * @return void
     */
    public function resort()
    {
        natsort($this->dict);

        $this->dict = array_values($this->dict);
    }

}