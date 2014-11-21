<?php namespace Teepluss\Wordbreaker\Wrapper;

use Closure;
use PhlongTaIam\WordBreaker;

class Breaker extends WordBreaker {

    /**
     * Configuration.
     *
     * @var array
     */
    protected $config;

    /**
     * Create a new Breaker.
     *
     * @param array $config
     * @param array $source
     */
    public function __construct($config, $source)
    {
        mb_internal_encoding('UTF-8');

        $this->config = $config;

        $this->dict = $source['dict'];
        $this->acceptors = $source['acceptors'];

        $this->acceptors->creators[] = $this->dict;
        $this->acceptors->creators[] = $source['wordRule'];
        $this->acceptors->creators[] = $source['spaceRule'];
        $this->acceptors->creators[] = $source['singleSymbolRule'];

        $this->pathInfoBuilder = $source['pathInfoBuilder'];
        $this->pathSelector = $source['pathSelector'];

        // Default data dict.
        $data = $this->config['dict'];
        $data = ($data instanceof Closure) ? $data() : $data;

        $this->add($data);
    }

    /**
     * Add data dict.
     *
     * @param mixed $word string|array
     */
    public function add($word)
    {
        if ( ! is_array($word))
        {
            $word = array($word);
        }

        $this->dict->add($word);
    }

    /**
     * Break a string into words.
     *
     * @param  string $str
     * @return array
     */
    public function make($str)
    {
        if ($this->config['array_sorting'])
        {
            $this->dict->resort();
        }

        $str = $this->clean($str);

        $words = $this->breakIntoWords($str);
        $words = array_map('trim', $words);

        $minLen = $this->config['minLen'];

        // Filter minimum length.
        $words = array_filter($words, function($str) use ($minLen)
        {
            return mb_strlen($str) >= $minLen;
        });

        $words = array_unique($words);

        return array_values($words);
    }

    /**
     * Cleaning text input.
     *
     * @param  string $str
     * @return string
     */
    protected function clean($str)
    {
        $str = strip_tags($str);

        // Logic cleaning from config.
        $str = $this->config['input_cleaning']($str);

        return $str;
    }

}
