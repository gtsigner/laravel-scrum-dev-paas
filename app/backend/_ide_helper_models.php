<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property-read mixed $id
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property-read mixed $id
 */
	class Project extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read mixed $id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 */
	class User extends \Eloquent {}
}

