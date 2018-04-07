<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\File
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $file_path
 * @property string $file_type
 * @property int $file_category_id
 * @property string $location
 * @property int $download_count
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\FileCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FileComment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FileTag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereDownloadCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereFileCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereUpdatedAt($value)
 */
	class File extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $user_name
 * @property string $email
 * @property string $password
 * @property int $role_id
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserName($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string $short_name
 * @property string $long_name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\FileTag
 *
 * @property int $id
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\File[] $files
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileTag whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileTag whereUpdatedAt($value)
 */
	class FileTag extends \Eloquent {}
}

namespace App{
/**
 * App\FileComment
 *
 * @property int $id
 * @property int $file_id
 * @property int|null $file_comment_id
 * @property int $user_id
 * @property string $comment
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FileComment[] $comments
 * @property-read \App\File $file
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileComment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileComment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileComment whereFileCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileComment whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileComment whereUserId($value)
 */
	class FileComment extends \Eloquent {}
}

namespace App\Helpers{
/**
 * App\Helpers\UserHelper
 *
 */
	class UserHelper extends \Eloquent {}
}

namespace App{
/**
 * App\FileCategory
 *
 * @property int $id
 * @property string $short_name
 * @property string $long_name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\File[] $files
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileCategory whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileCategory whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileCategory whereUpdatedAt($value)
 */
	class FileCategory extends \Eloquent {}
}

