<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    public $useDbConfig = 'default';
    const HYPHEN = '_';

    public function handleException($message) {
        error_log($message);
        throw new Exception($message);
    }

    public function createFieldValueArray(DataTransferObject $dto) {
        $schema = $this->schema();
        $modelColumns = array_keys($schema);
        $columnValueMap = array();
        foreach($modelColumns as $column) {
            $propertyName = $this->convertHyphenToCameCase($column);
            if ( isset($dto->$propertyName) && strlen($dto->$propertyName) > 0)  {
                $columnValueMap[$column] = $dto->$propertyName;
            }
        }
        return $columnValueMap;
    }

    public function createDTOFromResult($dto, $result) {
        $schema = $this->schema();
        $modelColumns = array_keys($schema);
        foreach($modelColumns as $column) {
            $propertyName = $this->convertHyphenToCameCase($column);
            $dto->$propertyName = $result[$column];
        }
        return $dto;
    }

    //Converts a string of type source_title to sourceTitle
    private function convertHyphenToCameCase($string) {
        $parts = explode(self::HYPHEN, $string);
        //ucfirst is the callback function applies to parts
        $parts = array_map('ucfirst', $parts);
        $outputString = lcfirst(implode('', $parts));
        //error_log($string . ' - ' . $outputString);
        return $outputString;
    }
}
