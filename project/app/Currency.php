<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    const UPDATED_AT = null;

    protected $table = 'exchange_rates';

    protected $fillable = ['currency', 'rate', 'created_at'];

    /**
     * Get previous currency rate.
     * If previous rate is same as current, return false
     * @return float|bool
     */
    public function getPreviousRateAttribute(){
        $yesterday = Currency::where('currency', $this->currency)->orderBy('created_at', 'desc')->skip(1)->first();
        return $yesterday->rate && $this->rate != $yesterday->rate ? $yesterday->rate : false;
    }

}
