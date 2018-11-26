<?php
namespace MegafonVirtualAts\Services;

use GuzzleHttp\Exception\RequestException;
use React\Promise\Promise;
use Illuminate\Support\Facades\Log;
use MegafonVirtualAts\Contracts\ICrmToAts;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * @property  config
 */
class CrmToAts implements ICrmToAts
{
    public $client;
    public $config;

    //TODO: do headers
    public function __construct($client, $config)
    {
        $this->config = $config;
        $this->client = $client;
    }

    /**
     * Запрос от CRM к Облачной АТС для получения сотрудников.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function accounts($params = [], $method = 'POST', $headers = [])
    {
        return $this->client->request($method, $this->config['base_uri'], ['form_params'=> array_merge($params, ['cmd' => 'accounts'])]);
    }

    /**
     * Запрос от CRM к Облачной АТС для получения отделов.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function groups($params = [], $method = 'POST', $headers = [])
    {
        return $this->client->request($method, $this->config['base_uri'], ['form_params'=> array_merge($params, ['cmd' => 'groups'])]);
    }

    /**
     * Команда необходимая для того, чтобы инициировать звонок от менеджера клиенту.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function makeCall( $params = [], $method = 'POST', $headers = [])
    {
        return $this->client->request($method, $this->config['base_uri'], ['form_params'=> array_merge($params, ['cmd' => 'makeCall'])]);
    }

    /**
     * Команда необходима для того, чтобы получить из Облачной АТС историю звонков за нужный период времени.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function history($params = ['cmd' => 'history'], $method = 'POST', $headers = [])
    {
        return $this->client->request($method, $this->config['base_uri'], ['form_params'=> array_merge($params, ['cmd' => 'history'])]);
    }

    /**
     * Запрос от CRM к Облачной АТС для включение / выключения приема звонков сотрудником во всех его отделах или конкретном отделе.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function subscribeOnCalls($params = ['cmd' => 'subscribeOnCalls'], $method = 'POST', $headers = [])
    {
        return $this->client->request($method, $this->config['base_uri'], ['form_params'=> array_merge($params, ['cmd' => 'subscribeOnCalls'])]);
    }

    /**
     * Запрос от CRM к Облачной АТС для проверки факта приема звонков сотрудником в конкретном отделе.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function subscriptionStatus($params = ['cmd' => 'subscriptionStatus'], $method = 'POST', $headers = [])
    {
        return $this->client->request($method, $this->config['base_uri'], ['form_params'=> array_merge($params, ['cmd' => 'subscriptionStatus'])]);
    }

    /**
     * Запрос от CRM к Облачной АТС позволяет включить или выключить прием звонков сотрудником Облачной АТС.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function send_dnd($params = ['cmd' => 'send_dnd'], $method = 'POST', $headers = [])
    {
        return $this->client->request($method, $this->config['base_uri'], ['form_params'=> array_merge($params, ['cmd' => 'send_dnd'])]);
    }

    /**
     * Запрос от CRM к Облачной АТС позволяет узнать включен или выключен прием звонков сотрудником Облачной АТС.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function get_dnd($params = ['cmd' => 'get_dnd'], $method = 'POST', $headers = [])
    {
        return $this->client->request($method, $this->config['base_uri'], ['form_params'=> array_merge($params, ['cmd' => 'get_dnd'])]);
    }
}