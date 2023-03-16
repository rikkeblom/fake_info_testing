<?php

/**
 * Class FakeInfo
 * @author  Arturo Mora-Rioja
 * @version 1.0.0 March 2023
 */

class FakeInfo {

    public const DATE_FORMAT = 'd/m/Y';
    public const GENDER_FEMININE = 'F';
    public const GENDER_MASCULINE = 'M';
    private const FILE_PERSON_NAMES = 'data/person-names.json';

    private string $cpr;    
    private string $firstName;
    private string $lastName;
    private string $gender;
    private string $birthDate;
    private array $address = [];
    private string $phone = '';  

    public function __construct()
    {
        $this->setFullNameAndGender();
        $this->setBirthDate();
        $this->setCpr();

    }
    
    /**
     * Generates a fake CPR based on the existing birth date and gender.
     * - If no birth date exists, it generates it.
     * - If no first name, last name or gender exists, it generates them.
     */
    private function setCpr(): void
    {
        if (!isset($this->birthDate)) {
            $this->setBirthDate();        
        }
        if (!isset($this->firstName) || !isset($this->lastName) || (!isset($this->gender))){
            $this->setFullNameAndGender();
        }
        // The CPR must end in an even number for females, odd for males
        $finalDigit = mt_rand(0, 9);
        if ($this->gender === self::GENDER_FEMININE && fmod($finalDigit, 2) === 1) {
            $finalDigit++;
        }
        
        $this->cpr = substr($this->birthDate, 8, 2) . 
            substr($this->birthDate, 5, 2) .
            substr($this->birthDate, 2, 2) .
            mt_rand(0, 9) .
            mt_rand(0, 9) .
            mt_rand(0, 9) .
            $finalDigit;
    }

    /**
     * Generates a fake date of birth from 1900 to the present year.
     */
    private function setBirthDate(): void 
    {
        $year = mt_rand(1900, date('Y'));
        $month = mt_rand(1, 12);
        if (in_array($month, [1, 3, 5, 7, 8, 10, 12])) {
            $day = mt_rand(1, 31);
        } else if (in_array($month, [4, 6, 9, 11])) {
            $day = mt_rand(1, 30);
        } else {
            // Leap years are not taken into account
            // so as not to overcomplicate the code
            $day = mt_rand(1, 28);
        }
        $this->birthDate = date_format(date_create("$year-$month-$day"), 'Y-m-d');
    }

    /**
     * Generates a fake full name and gender.
     * - The generation consists in extracting them randomly from the person's JSON file.
     */
    private function setFullNameAndGender(): void
    {
        $names = json_decode(file_get_contents(self::FILE_PERSON_NAMES), true);
        $person = $names['persons'][mt_rand(0, count($names['persons']))];
        
        $this->firstName = $person['firstName'];
        $this->lastName = $person['lastName'];
        $this->gender = ($person['gender'] === 'female' ? self::GENDER_FEMININE : self::GENDER_MASCULINE);
    }

    /**
     * Returns a fake CPR.
     * - If it does not exist already, it generates a new one.
     * - Since the CPR depends on the date of birth and the gender,
     *   if any of these do not exist, they are also generated
     * 
     * @return string The fake CPR
     */
    public function getCpr(): string {
        return $this->cpr; 
    }
    
    /**
     * Returns a fake full name and gender
     * 
     * @return array ['firstName' => value, 'lastName' => value, 'gender' => 'female' | 'male']
     */
    public function getFullNameAndGender(): array 
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'gender' => $this->gender
        ];
    }

    /**
     * Returns a fake full name, gender, and birth date
     * 
     * @return array ['firstName' => value, 'lastName' => value, 'gender' => 'female' | 'male', 'birthDate' => value]
     */
    public function getFullNameGenderAndBirthDate(): array 
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'gender' => $this->gender,
            'birthDate' => $this->birthDate
        ];
    }
}