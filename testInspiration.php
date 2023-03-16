<?php

class TestInspiration {

public function setCpr(string $cpr): bool {
    if (!preg_match('/^[0-9]{10}$/', $cpr)) {
        return false;
    } else {
        $this->cpr = $cpr;
        return true;
    };
}

private function nameIsValid(string $name): bool {
    return ((strlen($name) > 0) && (strlen($name) <= 30) && (preg_match('/^[a-zA-ZæøåñçáéíóúàèìòùäëïöüâêîôûÆØÅÑÇÁÉÍÓÚÀÈÌÒÙÄËÏÖÜÂÊÎÔÛ \-]+$/i', $name)));
}

public function setFirstName(string $firstName): bool {
    if (!$this->nameIsValid($firstName)) {
        return false;
    } else {            
        $this->firstName = $firstName;
        return true;
    }
}

public function setLastName(string $lastName): bool {
    if (!$this->nameIsValid($lastName)) {
        return false;
    } else {            
        $this->lastName = $lastName;
        return true;
    }
}

private function formatDate(string $date): string {
    $date = trim($date);
    if (!DateTime::createFromFormat(self::DATE_FORMAT, $date)) {
        return false;
    } elseif (!checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4))) {
        return false;
    } else {
        return date(self::DATE_FORMAT, strtotime($this->formatDateAmerican($date)));
    }        
}

private function formatDateAmerican(string $date): string {
    return substr($date, 6, 4) . '/' . substr($date, 3, 2) . '/' . substr($date, 0, 2);
}

public function setDateOfBirth(string $birthDate): bool {
    if (!$dob = $this->formatDate($birthDate)) {
        return false;
    } else {
        $dob = $this->formatDateAmerican($dob);
        if (date_diff(date_create($dob), date_create())->format('%y') < 18) {
            return false;
        } else {
            $this->birthDate = $birthDate;
            return true;
        }
    }
}
}
