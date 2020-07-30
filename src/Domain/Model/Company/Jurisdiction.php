<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use App\Domain\Model\StringEnumTrait;
use MyCLabs\Enum\Enum;

/**
 * @method static self ALABAMA
 * @method static self ALASKA
 * @method static self ARIZONA
 * @method static self ARKANSAS
 * @method static self CALIFORNIA
 * @method static self COLORADO
 * @method static self CONNECTICUT
 * @method static self DELAWARE
 * @method static self DISTRICT_OF_COLUMBIA
 * @method static self FLORIDA
 * @method static self GEORGIA
 * @method static self HAWAII
 * @method static self IDAHO
 * @method static self ILLINOIS
 * @method static self INDIANA
 * @method static self IOWA
 * @method static self KANSAS
 * @method static self KENTUCKY
 * @method static self LOUISIANA
 * @method static self MAINE
 * @method static self MONTANA
 * @method static self NEBRASKA
 * @method static self NEVADA
 * @method static self NEW_HAMPSHIRE
 * @method static self NEW_JERSEY
 * @method static self NEW_MEXICO
 * @method static self NEW_YORK
 * @method static self NORTH_CAROLINA
 * @method static self NORTH_DAKOTA
 * @method static self OHIO
 * @method static self OKLAHOMA
 * @method static self OREGON
 * @method static self MARYLAND
 * @method static self MASSACHUSETTS
 * @method static self MICHIGAN
 * @method static self MINNESOTA
 * @method static self MISSISSIPPI
 * @method static self MISSOURI
 * @method static self PENNSYLVANIA
 * @method static self RHODE_ISLAND
 * @method static self SOUTH_CAROLINA
 * @method static self SOUTH_DAKOTA
 * @method static self TENNESSEE
 * @method static self TEXAS
 * @method static self UTAH
 * @method static self VERMONT
 * @method static self VIRGINIA
 * @method static self WASHINGTON
 * @method static self WEST_VIRGINIA
 * @method static self WISCONSIN
 * @method static self WYOMING
 */
final class Jurisdiction extends Enum
{
    use StringEnumTrait;

    private const ALABAMA = 'us_al';
    private const ALASKA = 'us_ak';
    private const ARIZONA = 'us_az';
    private const ARKANSAS = 'us_ar';
    private const CALIFORNIA = 'us_ca';
    private const COLORADO = 'us_co';
    private const CONNECTICUT = 'us_ct';
    private const DELAWARE = 'us_de';
    private const DISTRICT_OF_COLUMBIA = 'us_dc';
    private const FLORIDA = 'us_fl';
    private const GEORGIA = 'us_ga';
    private const HAWAII = 'us_hi';
    private const IDAHO = 'us_id';
    private const ILLINOIS = 'us_il';
    private const INDIANA = 'us_in';
    private const IOWA = 'us_ia';
    private const KANSAS = 'us_ks';
    private const KENTUCKY = 'us_ky';
    private const LOUISIANA = 'us_la';
    private const MAINE = 'us_me';
    private const MONTANA = 'us_mt';
    private const NEBRASKA = 'us_ne';
    private const NEVADA = 'us_nv';
    private const NEW_HAMPSHIRE = 'us_nh';
    private const NEW_JERSEY = 'us_nj';
    private const NEW_MEXICO = 'us_nm';
    private const NEW_YORK = 'us_ny';
    private const NORTH_CAROLINA = 'us_nc';
    private const NORTH_DAKOTA = 'us_nd';
    private const OHIO = 'us_oh';
    private const OKLAHOMA = 'us_ok';
    private const OREGON = 'us_or';
    private const MARYLAND = 'us_md';
    private const MASSACHUSETTS = 'us_ma';
    private const MICHIGAN = 'us_mi';
    private const MINNESOTA = 'us_mn';
    private const MISSISSIPPI = 'us_ms';
    private const MISSOURI = 'us_mo';
    private const PENNSYLVANIA = 'us_pa';
    private const RHODE_ISLAND = 'us_ri';
    private const SOUTH_CAROLINA = 'us_sc';
    private const SOUTH_DAKOTA = 'us_sd';
    private const TENNESSEE = 'us_tn';
    private const TEXAS = 'us_tx';
    private const UTAH = 'us_ut';
    private const VERMONT = 'us_vt';
    private const VIRGINIA = 'us_va';
    private const WASHINGTON = 'us_wa';
    private const WEST_VIRGINIA = 'us_wv';
    private const WISCONSIN = 'us_wi';
    private const WYOMING = 'us_wy';

    private const NAMES = [
        'alabama' => self::ALABAMA,
        'alaska' => self::ALASKA,
        'arizona' => self::ARIZONA,
        'arkansas' => self::ARKANSAS,
        'california' => self::CALIFORNIA,
        'colorado' => self::COLORADO,
        'connecticut' => self::CONNECTICUT,
        'delaware' => self::DELAWARE,
        'district of columbia' => self::DISTRICT_OF_COLUMBIA,
        'florida' => self::FLORIDA,
        'georgia' => self::GEORGIA,
        'hawaii' => self::HAWAII,
        'idaho' => self::IDAHO,
        'illinois' => self::ILLINOIS,
        'indiana' => self::INDIANA,
        'iowa' => self::IOWA,
        'kansas' => self::KANSAS,
        'kentucky' => self::KENTUCKY,
        'louisiana' => self::LOUISIANA,
        'maine' => self::MAINE,
        'montana' => self::MONTANA,
        'nebraska' => self::NEBRASKA,
        'nevada' => self::NEVADA,
        'new hampshire' => self::NEW_HAMPSHIRE,
        'new jersey' => self::NEW_JERSEY,
        'new mexico' => self::NEW_MEXICO,
        'new york' => self::NEW_YORK,
        'north carolina' => self::NORTH_CAROLINA,
        'north dakota' => self::NORTH_DAKOTA,
        'ohio' => self::OHIO,
        'oklahoma' => self::OKLAHOMA,
        'oregon' => self::OREGON,
        'maryland' => self::MARYLAND,
        'massachusetts' => self::MASSACHUSETTS,
        'michigan' => self::MICHIGAN,
        'minnesota' => self::MINNESOTA,
        'mississippi' => self::MISSISSIPPI,
        'missouri' => self::MISSOURI,
        'pennsylvania' => self::PENNSYLVANIA,
        'rhode island' => self::RHODE_ISLAND,
        'south carolina' => self::SOUTH_CAROLINA,
        'south dakota' => self::SOUTH_DAKOTA,
        'tennessee' => self::TENNESSEE,
        'texas' => self::TEXAS,
        'utah' => self::UTAH,
        'vermont' => self::VERMONT,
        'virginia' => self::VIRGINIA,
        'washington' => self::WASHINGTON,
        'west virginia' => self::WEST_VIRGINIA,
        'wisconsin' => self::WISCONSIN,
        'wyoming' => self::WYOMING,
    ];

    public static function fromName(string $name): self
    {
        return new self(self::NAMES[strtolower($name)]);
    }

    public function toName(): string
    {
        $names = array_flip(self::NAMES);
        return ucwords($names[$this->toString()]);
    }
}
