<?php

namespace App\Http\Controllers;

use App\Constants\Cities;

/**
 * MessagesController Class represent messages actions
 * @package App\Http\Controllers
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class MessagesController extends Controller
{
    /**
     * list all messages sorted with its sentiment
     */
    public function listMessages()
    {
        $messagesArray = [];
        // hit spread sheet url to get messages data
        $url = "https://spreadsheets.google.com/feeds/list/0Ai2EnLApq68edEVRNU0xdW9QX1BqQXhHRl9sWDNfQXc/od6/public/basic?alt=json";
        $urlContents = json_decode(file_get_contents($url), true);
        // check data existence
        if (is_array($urlContents['feed']) && !empty($urlContents['feed'])) {
            $feedData = $urlContents['feed'];
            if (is_array($feedData['entry']) && !empty($feedData['entry'])) {
                $entryData = $feedData['entry'];
                foreach ($entryData as $entryIndex => $entry) {
                    if (
                        is_array($entry['content']) &&
                        !empty($entry['content']) &&
                        $entry['content']['$t']
                    ) {
                        $messageString = $entry['content']['$t'];
                        // divide message string and to extract message's data
                        $messageDataObject = $this->getMessageDataAsObject($messageString);
                        $messagesArray[$entryIndex] = $messageDataObject;
                    }
                }
            }

        }
        return view('list-messages', compact('messagesArray'));
    }

    /**
     * divide message string and create new object contain message's data
     * @param string $messageString message string which contain message data
     * @return \stdClass message's data in object
     */
    private function getMessageDataAsObject(string $messageString) :\stdClass
    {
        $messageDetails = explode(',', $messageString);
        $messageDetailsCounter = count($messageDetails) - 1;
        $messageId = explode(':', $messageDetails[0]);
        $messageSentiment = explode(':', $messageDetails[$messageDetailsCounter]);
        $messageStatement = '';
        foreach ($messageDetails as $messageIndex => $data) {
            if ($messageIndex != 0 && $messageIndex != $messageDetailsCounter) {
                $messageStatement .= $messageDetails[$messageIndex];
            }
        }
        $messageStatement = explode(':', $messageStatement);
        // prepare message data in object
        $messageDataObject            = new \stdClass();
        $messageDataObject->id        = $messageId[1];
        $messageDataObject->statment  = $messageStatement[1];
        $messageDataObject->sentiment = $messageSentiment[1];
        $messageDataObject->cityName  = $this->getMessageCity($messageDataObject->statment);

        return $messageDataObject;
    }

    /**
     * check if string contain  a city name from predefined cities and return it if exist
     * @param string $messageStatement message statement string
     * @return string city name
     */
    private function getMessageCity(string $messageStatement) : string
    {
        $citiesNames = Cities::getCitiesNames();
        $cityName = '';
        foreach ($citiesNames as $city) {
            if (strpos($messageStatement, $city) !== false) {
                $cityName = $city;
            }
        }
        return $cityName;
    }
}
