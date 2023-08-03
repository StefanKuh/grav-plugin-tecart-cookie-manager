<?php

namespace Grav\Plugin\TecartCookieManager\Classes\CookieConsent;

use Grav\Common\Grav;
use Grav\Common\Utils;
use Grav\Common\Data\Data;
use Grav\Common\File\CompiledYamlFile;
use Grav\Common\Language\Language;


/**
 * Tecart Cookie Manager Plugin Cookie Manager Class
 *
 */
class CookieConsent extends Data {

    /**
     * get data object of given type
     *
     * @return object
     */
    public static function getYamlDataByType($type) {

        //location of yaml files
        $dataStorage = 'user://data';

        if (array_key_exists('data_storage', Grav::instance()['config']['plugins']['tecart-cookie-manager'])) {
            if (Grav::instance()['config']['plugins']['tecart-cookie-manager']['data_storage'] == "pages") {
                $dataStorage = 'page://assets';
            }
        }

        if(file_exists(Grav::instance()['locator']->findResource($dataStorage) . DS . $type . "." . Grav::instance()['language']->getActive() . ".yaml")) {
            return CompiledYamlFile::instance(Grav::instance()['locator']->findResource($dataStorage) . DS . $type . "." . Grav::instance()['language']->getActive() . ".yaml")->content();
        } else {
            return CompiledYamlFile::instance(Grav::instance()['locator']->findResource($dataStorage) . DS . $type . ".yaml")->content();
        }
    }

}
