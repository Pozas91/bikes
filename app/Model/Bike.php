<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    /**
     * Table
     * @var string
     **/
    protected $table = 'bikes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branch', 'model', 'engine',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * @return string
     */
    public function getFullModelAttribute() : string {
        return "{$this->getAttribute('branch')} {$this->getAttribute('model')} {$this->getAttribute('engine')}";
    }

    /**
     * @return float
     */
    public function getMaxConsumptionAttribute() : float {
        $consumptions = $this->consumptions()->get();
        $max = 0.0;

        foreach($consumptions as $consumption) {
            $current = ($consumption->getAttribute('liters') * 100) / $consumption->getAttribute('km');
            $max = max($current, $max);
        }

        return round($max, 2);
    }

    /**
     * @return float
     */
    public function getMinConsumptionAttribute() : float {
        $consumptions = $this->consumptions()->get();
        $min = 20;

        foreach($consumptions as $consumption) {
            $current = ($consumption->getAttribute('liters') * 100) / $consumption->getAttribute('km');
            $min = min($current, $min);
        }

        return round($min, 2);
    }

    /**
     * @return float
     */
    public function getHighwayConsumptionAttribute() : float {
        $liters = $this->consumptions()->where('driving_type', 'highway')->sum('liters');
        $km = $this->consumptions()->where('driving_type', 'highway')->sum('km');

        $highwayConsumption = ($km > 0) ? ($liters * 100) / $km : 0;

        return round($highwayConsumption, 2);
    }

    /**
     * @return float
     */
    public function getMixedConsumptionAttribute() : float {
        $liters = $this->consumptions()->where('driving_type', 'mixed')->sum('liters');
        $km = $this->consumptions()->where('driving_type', 'mixed')->sum('km');

        $mixedConsumption = ($km > 0) ? ($liters * 100) / $km : 0;

        return round($mixedConsumption, 2);
    }

    /**
     * @return float
     */
    public function getUrbanConsumptionAttribute() : float {
        $liters = $this->consumptions()->where('driving_type', 'urban')->sum('liters');
        $km = $this->consumptions()->where('driving_type', 'urban')->sum('km');

        $urbanConsumption = ($km > 0) ? ($liters * 100) / $km : 0;

        return round($urbanConsumption, 2);
    }

    /**
     * @return float
     */
    public function getPassengerConsumptionAttribute() : float {
        $liters = $this->consumptions()->where('passenger', true)->sum('liters');
        $km = $this->consumptions()->where('passenger', true)->sum('km');

        $passengerConsumption = ($km > 0) ? ($liters * 100) / $km : 0;

        return round($passengerConsumption, 2);
    }

    /**
     * @return float
     */
    public function getNotPassengerConsumptionAttribute() : float {
        $liters = $this->consumptions()->where('passenger', false)->sum('liters');
        $km = $this->consumptions()->where('passenger', false)->sum('km');

        $notPassengerConsumption = ($km > 0) ? ($liters * 100) / $km : 0;

        return round($notPassengerConsumption, 2);
    }

    /**
     * @return float
     */
    public function getAvgConsumptionAttribute() : float {
        $liters = $this->consumptions()->sum('liters');
        $km = $this->consumptions()->sum('km');

        $avgConsumption = ($km > 0) ? ($liters * 100) / $km : 0;

        return round($avgConsumption, 2);
    }

    /**
     * @return float
     */
    public function getUserMaxConsumptionAttribute() : float {
        $consumptions = $this->consumptions()->where('user_id', auth()->user()->id)->get();
        $max = 0.0;

        foreach($consumptions as $consumption) {
            $current = ($consumption->getAttribute('liters') * 100) / $consumption->getAttribute('km');
            $max = max($current, $max);
        }

        return round($max, 2);
    }

    /**
     * @return float
     */
    public function getMinUserConsumptionAttribute() : float {
        $consumptions = $this->consumptions()->where('user_id', auth()->user()->id)->get();
        $min = 1000;

        foreach($consumptions as $consumption) {
            $current = ($consumption->getAttribute('liters') * 100) / $consumption->getAttribute('km');
            $min = ($current < $min) ? $current : $min;
        }

        return round($min, 2);
    }

    /**
     * @return float
     */
    public function getUserHighwayConsumptionAttribute() : float {
        $liters = $this->consumptions()->where('user_id', auth()->user()->id)->where('driving_type', 'highway')->sum('liters');
        $km = $this->consumptions()->where('user_id', auth()->user()->id)->where('driving_type', 'highway')->sum('km');

        $highwayConsumption = ($km > 0) ? ($liters * 100) / $km : 0;

        return round($highwayConsumption, 2);
    }

    /**
     * @return float
     */
    public function getUserMixedConsumptionAttribute() : float {
        $liters = $this->consumptions()->where('user_id', auth()->user()->id)->where('driving_type', 'mixed')->sum('liters');
        $km = $this->consumptions()->where('user_id', auth()->user()->id)->where('driving_type', 'mixed')->sum('km');

        $mixedConsumption = ($km > 0) ? ($liters * 100) / $km : 0;

        return round($mixedConsumption, 2);
    }

    /**
     * @return float
     */
    public function getUserUrbanConsumptionAttribute() : float {
        $liters = $this->consumptions()->where('user_id', auth()->user()->id)->where('driving_type', 'urban')->sum('liters');
        $km = $this->consumptions()->where('user_id', auth()->user()->id)->where('driving_type', 'urban')->sum('km');

        $urbanConsumption = ($km > 0) ? ($liters * 100) / $km : 0;

        return round($urbanConsumption, 2);
    }

    /**
     * @return float
     */
    public function getUserPassengerConsumptionAttribute() : float {
        $liters = $this->consumptions()->where('user_id', auth()->user()->id)->where('passenger', true)->sum('liters');
        $km = $this->consumptions()->where('user_id', auth()->user()->id)->where('passenger', true)->sum('km');

        $passengerConsumption = ($km > 0) ? ($liters * 100) / $km : 0;

        return round($passengerConsumption, 2);
    }

    /**
     * @return float
     */
    public function getUserNotPassengerConsumptionAttribute() : float {
        $liters = $this->consumptions()->where('user_id', auth()->user()->id)->where('passenger', false)->sum('liters');
        $km = $this->consumptions()->where('user_id', auth()->user()->id)->where('passenger', false)->sum('km');

        $notPassengerConsumption = ($km > 0) ? ($liters * 100) / $km : 0;

        return round($notPassengerConsumption, 2);
    }

    /**
     * @return float
     */
    public function getUserAvgConsumptionAttribute() : float {
        $liters = $this->consumptions()->where('user_id', auth()->user()->id)->sum('liters');
        $km = $this->consumptions()->where('user_id', auth()->user()->id)->sum('km');

        $avgConsumption = ($km > 0) ? ($liters * 100) / $km : 0;

        return round($avgConsumption, 2);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class, 'user_have_bikes', 'bike_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consumptions() {
        return $this->hasMany(Consumption::class, 'bike_id');
    }
}
