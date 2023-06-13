<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Doanphi
 *
 * @property string $MaDV
 * @property int $Nam1
 * @property int $Nam2
 * @property int $Nam3
 * @property int $Nam4
 *
 * @package App\Models
 */
class Doanphi extends Model
{
	protected $table = 'doanphi';
	protected $primaryKey = 'MaDV';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Nam1' => 'int',
		'Nam2' => 'int',
		'Nam3' => 'int',
		'Nam4' => 'int'
	];

	protected $fillable = [
		'MaDV',
		'Nam1',
		'Nam2',
		'Nam3',
		'Nam4'
	];
}
