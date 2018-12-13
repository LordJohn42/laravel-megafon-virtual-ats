<?php

namespace MegafonVirtualAts;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use MegafonVirtualAts\Exception\TokenExpectedException;
use MegafonVirtualAts\Exception\URIExcectedException;
use MegafonVirtualAts\Services\AtsToCrm;
use MegafonVirtualAts\Services\CrmToAts;
use MegafonVirtualAts\Exception\MethodNotFoundException;

class MegafonVirtualAts
{
    /**
    * Configuration
    * @var array
    */
    public $config;
    /**
     * @var
     */
    protected $crmToAts;
    /**
     * @comment Guzzle defacto standard.
     * @var
     */
    public $client;
    /**
     * @var
     */
    public $baseUri;
    /**
     * @var
     */
    protected $token;


    /**
     *
     * MegafonVirtualAts constructor.
     * @param $config
     * @throws TokenExpectedException
     * @throws URIExcectedException
     */
    public function __construct($config)
    {
        // Если есть в конфиге, берем оттуда, если нету, читаем из конфига
        $baseURI = isset($config['base_uri']) ? $config['base_uri'] : config('megafon.base_uri');

        if (!$baseURI) {
            throw new URIExcectedException('Token expected.');
        }

        // Если нету токена, выбрасываем исключение.
        if (!(isset($config['token']))){
            throw new TokenExpectedException('Token expected.');
        }

        $this->setToken($config['token']);
        $this->setBaseUri($baseURI);

        $this->client = new Client($config);
        $this->setCrmToAts(new CrmToAts($this->client, $config));
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws MethodNotFoundException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function __call($name, $arguments)
    {
        // Делаем массив доступных методов и выпиливаем методы начинающиеся на __
        $availableMethods = collect(explode(',',implode(',',get_class_methods(CrmToAts::class)).','))->filter(function($item){
            if(!$item) {return false;}
            if(strpos($item,'__')!==false) {return false;}
            return true;
        })->toArray();

        if (!(in_array($name, $availableMethods))) {
            throw new MethodNotFoundException('Method ' . $name . ' not found in API');
        }

        // Если передали в качестве первого аргумента строку, значит меняем метод отправки на указанный
        $method = (isset($arguments[0]) &&is_string($arguments[0])) ? $arguments[0] : 'POST';
        // Если первый аргумент boolean, значит нам нужно получить полноценный Guzzle/Response Object
        $need_response_object = (isset($arguments[0]) && is_bool($arguments[0]) && $arguments[0] === true);
        // Если первый аргумент это массив, значит нужно передать это в параметры
        $params = (isset($arguments[0]) && is_array($arguments[0])) ? $arguments[0] : [];

        // Decorator
        // Наверняка это можно сделать лучше
        // Если первым параметром Arguments[0] передали true, вернем полноценный объект
        if ($need_response_object && method_exists($this->atsToCrm, $name))
        {
            return call_user_func_array([$this->atsToCrm, $name], [array_merge($params, ['cmd' => $name, 'token' => $this->getToken()]), $method]);
        }

        if ($need_response_object &&  method_exists($this->crmToAts, $name))
        {
            return call_user_func_array([$this->crmToAts, $name], [array_merge($params, ['cmd' => $name, 'token' => $this->getToken()]), $method]);
        }

        try {
            $res = $this->client->request($method, $this->config, ['form_params'=> array_merge($params, ['cmd' => $name, 'token' => $this->getToken()])])->getBody();
            $res = json_decode($res);
        }catch (ClientException $e) {
            $res =  json_decode($e->getResponse()->getBody());
        }catch (ServerException $e){
            $res = 'Server error!';
        }

        return $res;


    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * @param mixed $baseUri
     */
    public function setBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;
    }

    /**
     * @return mixed
     */
    public function getCrmToAts()
    {
        return $this->crmToAts;
    }

    /**
     * @param mixed $crmToAts
     */
    public function setCrmToAts($crmToAts)
    {
        $this->crmToAts = $crmToAts;
    }
}