<?php

class DataTransferObject {

    const HYPHEN = '_';

    protected $model;

    protected function setTextFields(StdClass $jsonObject) {
        foreach($this->textFields as $textField) {
            if ( isset($jsonObject->$textField) && $this->isValidValue($jsonObject->$textField) > 0 && property_exists($this, $textField)) {
                $value = htmlentities($jsonObject->$textField, ENT_COMPAT, "UTF-8");
                $this->$textField = $value;
            } else {
                $this->$textField = '';
            }
        }
    }

    protected function setDateFields(StdClass $jsonObject) {
        foreach($this->dateFields as $dateField) {
            if ( isset($jsonObject->$dateField) && $this->isValidValue($jsonObject->$dateField) > 0 && property_exists($this, $dateField) ) {
                if( !strtotime($jsonObject->$dateField) ){
                    throw new Exception($jsonObject->$dateField . ' not valid date.');
                }
                $dateTime = DateTime::createFromFormat('m/d/Y', $jsonObject->$dateField);
                $formattedDate = $dateTime->format('Y-m-d');
                $this->$dateField = $formattedDate;
            } else {
                $this->$dateField = '';
            }
        }
    }

    protected function setBooleanFields(StdClass $jsonObject) {
        foreach( $this->booleanFields as $booleanField ) {
            if ( isset($jsonObject->$booleanField) && $jsonObject->$booleanField == 'true' && property_exists($this, $booleanField) ) {
                $this->$booleanField = '1';
            } else {
                $this->$booleanField = '0';
            }
        }
    }

    protected function setNumericFields(StdClass $jsonObject) {
        foreach( $this->numericFields as $numericField ) {
            if ( isset($jsonObject->$numericField)  && property_exists($this, $numericField)) {
                $value = str_replace('$', '', $jsonObject->$numericField);
                $this->$numericField = $value;
            }
        }
    }


    protected  function createFieldValueArray() {
        $modelSchema = $this->model->schema();
        $modelColumns = array_keys($modelSchema);
        $columnValueMap = array();
        foreach($modelColumns as $column) {
            $propertyName = $this->convertHyphenToCameCase($column);
            if ( isset($this->$propertyName) && strlen($this->$propertyName) > 0)  {
                $columnValueMap[$column] = $this->$propertyName;
            }
        }
        return $columnValueMap;
    }

    //Converts a string of type source_title to sourceTitle
    protected function convertHyphenToCameCase($string) {
        $parts = explode(self::HYPHEN, $string);
        //ucfirst is the callback function applies to parts
        $parts = array_map('ucfirst', $parts);
        $outputString = lcfirst(implode('', $parts));
        //error_log($string . ' - ' . $outputString);
        return $outputString;
    }

    protected function isValidValue($value) {
        if ( isset($value) && strlen(trim($value)) > 0 ) {
            return true;
        } else {
            return false;
        }
    }
}