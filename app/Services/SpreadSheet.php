<?php

namespace App\Services;

use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

class SpreadSheet
{
    protected $client;
    protected $service;
    protected $sheetId;
    protected $range;

    public function __construct(string $sheetId = null, string $range = null)
    {
        $this->initClient()->initService();

        $this->sheetId = $sheetId ?: getenv('SPREAD_SHEET_ID');

        $this->range = $range ?: getenv('WORKSHEET_NAME');
    }

    protected function initClient()
    {
        if ($this->client) {
            return $this;
        }

        $appName = getenv('APP_NAME') ?? 'APP';

        $client = new Google_Client;
        $client->useApplicationDefaultCredentials();
        $client->setApplicationName($appName);
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS);

        if ($client->isAccessTokenExpired()) {
            $client->refreshTokenWithAssertion();
        }

        $this->client = $client;

        return $this;
    }

    protected function initService()
    {
        if ($this->service) {
            return $this;
        }

        $this->service = new Google_Service_Sheets($this->client);

        return $this;
    }

    /**
     * insert new row
     *
     * @param array $values
     * @param array $config
     * @return Google_Service_Sheets_AppendValuesResponse
     */
    public function insert(array $values, array $config = [])
    {
        $valueRange = new Google_Service_Sheets_ValueRange();
        $valueRange->setValues(['values' => $values]);

        $config = $config ?: ['valueInputOption' => 'RAW'];

        return $this->service->spreadsheets_values->append(
            $this->sheetId,
            $this->range,
            $valueRange,
            $config
        );
    }
}
