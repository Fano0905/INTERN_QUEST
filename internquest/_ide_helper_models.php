<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $cv
 * @property string $cover_letter
 * @property int $user_id
 * @property-read \App\Models\Offer|null $offre
 * @method static \Illuminate\Database\Eloquent\Builder|Application newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application query()
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCoverLetter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUserId($value)
 */
	class Application extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Company> $company
 * @property-read int|null $company_count
 * @method static \Illuminate\Database\Eloquent\Builder|Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area query()
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereName($value)
 */
	class Area extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \App\Models\Area|null $area
 * @property string $website
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\Evaluation> $evaluation
 * @property int $user_id
 * @property int $location_id
 * @property-read int|null $evaluation_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Location> $location
 * @property-read int|null $location_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Offer> $offre
 * @property-read int|null $offre_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEvaluation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsite($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $note
 * @property string $object
 * @property string $comment
 * @property int $company_id
 * @property int $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Company|null $entreprises
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereObject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereUserId($value)
 */
	class Evaluation extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $postal_code
 * @property string|null $city
 * @property string|null $way
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Company> $companies
 * @property-read int|null $companies_count
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereWay($value)
 */
	class Location extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $location
 * @property string $class
 * @property string $duration
 * @property int $remuneration
 * @property string $date_offer
 * @property int $place_offered
 * @property int|null $nb_application
 * @property string $description
 * @property int $company_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Application> $candidature
 * @property-read int|null $candidature_count
 * @property-read \App\Models\Company|null $entreprise
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDateOffer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereNbApplication($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer wherePlaceOffered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereRemuneration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereTitle($value)
 */
	class Offer extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $pilote_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $etudiants
 * @property-read int|null $etudiants_count
 * @property-read \App\Models\User|null $pilote
 * @method static \Illuminate\Database\Eloquent\Builder|Promo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo wherePiloteId($value)
 */
	class Promo extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $promo_id
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Promos_User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promos_User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promos_User query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promos_User wherePromoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promos_User whereUserId($value)
 */
	class Promos_User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id Primary Key
 * @property string|null $name Name of the skill
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Offer> $offer
 * @property-read int|null $offer_count
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereName($value)
 */
	class Skill extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @mixin IdeHelperUser
 * @property int $id
 * @property string|null $lname
 * @property string|null $fname
 * @property string|null $mail
 * @property mixed|null $password
 * @property string $username
 * @property string|null $role
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Promo> $promos
 * @property-read int|null $promos_count
 * @property-read \App\Models\Promo|null $promotion
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

