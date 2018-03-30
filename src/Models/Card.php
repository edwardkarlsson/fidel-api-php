<?php

namespace FidelAPI\Models;

class Card extends FidelModel
{
    /**
     * @var string
     */
    public $scheme;

    /**
     * @var string
     */
    public $accountId;

    /**
     * @var string
     */
    public $countryCode;

    /**
     * @var string
     */
    public $created;

    /**
     * @var integer
     */
    public $expYear;

    /**
     * @var string
     */
    public $expDate;

    /**
     * @var string
     */
    public $firstNumbers;

    /**
     * @var string
     */
    public $live;

    /**
     * @var integer
     */
    public $lastNumbers;

    /**
     * @var integer
     */
    public $expMonth;

    /**
     * @var string
     */
    public $updated;

    /**
     * @var string
     */
    public $metadata;

    /**
     * @var string
     */
    public $programId;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $type;
}
