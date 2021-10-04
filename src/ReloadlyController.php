<?php

namespace Ghanem\Reloadly;

use Ghanem\Reloadly\Request;

class ReloadlyController
{
    public function countries($page = null, $per_page = null)
    {
        return Request::countries($page, $per_page);
    }

    public function countryByIsoCode($iso_code)
    {
        return Request::countryByIsoCode($iso_code);
    }

    public function operators($country_iso_code = null,$page = null, $per_page = null)
    {
        return Request::operators($country_iso_code, $page, $per_page);
    }

    public function operatorById($id)
    {
        return Request::operatorById($id);
    }

    public function autoDetectOperator($country_iso_code, $phone)
    {
        return Request::autoDetectOperator($country_iso_code, $phone);
    } 

    public function balances()
    {
        return Request::balances();
    }

    public function createTransaction($operator_id, $amount, Array $recipient_phone, $refrance_id = null)
    {
        return Request::CreateTransaction($operator_id, $amount, $recipient_phone, $refrance_id);
    } 

    public function transactionById($id)
    {
        return Request::transactionById($id);
    }


    public function transactions($page = null, $per_page = null)
    {
        return Request::transactions($page, $per_page);
    }

}
