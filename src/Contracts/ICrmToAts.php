<?php

namespace MegafonVirtualAts\Contracts;


interface ICrmToAts
{
    const URL_ACCOUNTS = '/accounts';
    const URL_GROUPS = '/groups';
    const URL_MAKE_CALL = '/makeCall';
    const URL_HISTORY = '/history';
    const URL_SUBSCRIBE_ON_CALLS = '/subscribeOnCalls';


    /**
     * Запрос от CRM к Облачной АТС для получения сотрудников.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function accounts($method = 'POST', $params = [], $headers = []);

    /**
     * Запрос от CRM к Облачной АТС для получения отделов.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function groups($method = 'POST', $params =  [], $headers = []);

    /**
     * Команда необходимая для того, чтобы инициировать звонок от менеджера клиенту.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function makeCall($method = 'POST', $params = [], $headers = []);

    /**
     * Команда необходима для того, чтобы получить из Облачной АТС историю звонков за нужный период времени.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function history($method = 'POST', $params = [], $headers = []);

    /**
     * Запрос от CRM к Облачной АТС для включение / выключения приема звонков сотрудником во всех его отделах или конкретном отделе.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function subscribeOnCalls($method = 'POST', $params = [], $headers = []);

    /**
     * Запрос от CRM к Облачной АТС для проверки факта приема звонков сотрудником в конкретном отделе.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function subscriptionStatus($method = 'POST', $params = [], $headers = []);

    /**
     * Запрос от CRM к Облачной АТС позволяет включить или выключить прием звонков сотрудником Облачной АТС.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function send_dnd($method = 'POST', $params = [], $headers = []);

    /**
     * Запрос от CRM к Облачной АТС позволяет узнать включен или выключен прием звонков сотрудником Облачной АТС.
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function get_dnd($method = 'POST', $params = [], $headers = []);


}