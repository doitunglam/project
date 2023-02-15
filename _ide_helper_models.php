<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Campaign
 *
 * @property string $id
 * @property int $creator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $image
 * @property string $url
 * @property string $info
 * @property string $criteria
 * @property string $commission
 * @property string $title
 * @method static \Database\Factories\CampaignFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign query()
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereCriteria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereUrl($value)
 */
	class Campaign extends \Eloquent {}
}

