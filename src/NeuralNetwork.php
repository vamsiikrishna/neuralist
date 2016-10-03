<?php

namespace Vamsi\Neuralist;

use Predis\Client;

class NeuralNetwork
{

    protected $name;
    protected $type;
    protected $inputs;
    protected $outputs;
    protected $hidden_layers;
    protected $dataset_size;
    protected $testset_size;
    protected $normalize = true;

    /**
     * @var Client
     */
    protected $redis_client = NUll;

    protected $prefix = 'nn:';
    protected $auto_create = true;

    /**
     * NeuralNetwork constructor.
     * @param $name
     * @param $type
     * @param $inputs
     * @param $outputs
     * @param $hidden_layers
     * @param $dataset_size
     * @param $testset_size
     * @param bool $normalize
     * @param null $redis_client
     * @param string $prefix
     * @param bool $auto_create
     */
    public function __construct($name, $type, $inputs = [], $outputs, $hidden_layers, $dataset_size, $testset_size, $normalize, $prefix = 'nn:', $auto_create = true, $redis_client)
    {
        $this->name = $name;
        $this->type = $type;
        $this->inputs = $inputs;
        $this->outputs = $outputs;
        $this->hidden_layers = $hidden_layers;
        $this->dataset_size = $dataset_size;
        $this->testset_size = $testset_size;
        $this->normalize = $normalize;
        $this->redis_client = $redis_client;
        $this->prefix = $prefix;
        $this->auto_create = $auto_create;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * @param mixed $inputs
     */
    public function setInputs($inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * @return mixed
     */
    public function getOutputs()
    {
        return $this->outputs;
    }

    /**
     * @param mixed $outputs
     */
    public function setOutputs($outputs)
    {
        $this->outputs = $outputs;
    }

    /**
     * @return mixed
     */
    public function getHiddenLayers()
    {
        return $this->hidden_layers;
    }

    /**
     * @param mixed $hidden_layers
     */
    public function setHiddenLayers($hidden_layers)
    {
        $this->hidden_layers = $hidden_layers;
    }

    /**
     * @return mixed
     */
    public function getDatasetSize()
    {
        return $this->dataset_size;
    }

    /**
     * @param mixed $dataset_size
     */
    public function setDatasetSize($dataset_size)
    {
        $this->dataset_size = $dataset_size;
    }

    /**
     * @return mixed
     */
    public function getTestsetSize()
    {
        return $this->testset_size;
    }

    /**
     * @param mixed $testset_size
     */
    public function setTestsetSize($testset_size)
    {
        $this->testset_size = $testset_size;
    }

    /**
     * @return boolean
     */
    public function isNormalize()
    {
        return $this->normalize;
    }

    /**
     * @param boolean $normalize
     */
    public function setNormalize($normalize)
    {
        $this->normalize = $normalize;
    }

    /**
     * @return null
     */
    public function getRedisClient()
    {
        return $this->redis_client;
    }

    /**
     * @param null $redis_client
     */
    public function setRedisClient($redis_client)
    {
        $this->redis_client = $redis_client;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return boolean
     */
    public function isAutoCreate()
    {
        return $this->auto_create;
    }

    /**
     * @param boolean $auto_create
     */
    public function setAutoCreate($auto_create)
    {
        $this->auto_create = $auto_create;
    }

    public function info()
    {
        $result = $this->redis_client->executeRaw(['nr.info', $this->name]);

        return $result;
    }

    public function create()
    {
        $result = $this->redis_client->executeRaw('nr.create');

        return $result;
    }

}



